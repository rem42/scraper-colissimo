Scraper Colissimo
=================

![Packagist version](https://flat.badgen.net/packagist/v/rem42/scraper-colissimo)
![Packagist download](https://flat.badgen.net/packagist/dt/rem42/scraper-colissimo)
![Packagist name](https://flat.badgen.net/packagist/name/rem42/scraper-colissimo)
![Packagist php version](https://flat.badgen.net/packagist/php/rem42/scraper-colissimo)
![Github licence](https://flat.badgen.net/github/license/rem42/scraper-colissimo)
![Depenabot](https://flat.badgen.net/github/dependabot/rem42/scraper-colissimo)
![Codeclimate lines of code](https://flat.badgen.net/codeclimate/loc/rem42/scraper-colissimo)
![Codeclimate maintainability](https://flat.badgen.net/codeclimate/maintainability/rem42/scraper-colissimo)

Colissimo (La Poste) REST/JSON APIs client:

| Feature                                          | Colissimo API                                   | Request                                                            |
|--------------------------------------------------|-------------------------------------------------|--------------------------------------------------------------------|
| Label creation (France, overseas, international) | SLS v3.1 `generateLabel`                        | `ColissimoGenerateLabelRequest`                                    |
| Label reprint                                    | SLS v3.1 `getLabel`                             | `ColissimoGetLabelRequest`                                         |
| Dematerialized invoice / CN23 upload             | Documents API `storedocument`, `updatedocument` | `ColissimoStoreDocumentRequest`, `ColissimoUpdateDocumentRequest` |
| Parcel tracking                                  | Timeline tracking `timelineCompany`             | `ColissimoTrackingTimelineRequest`                                 |

Installation
------------

````bash
composer require rem42/scraper-colissimo
````

Requirement
-----------

- PHP >= 8.4

Authentication
--------------

The SLS v3 web service is authenticated with the API key ("Clé de connexion aux Web Services") generated in the
Colissimo Box (profile page). The Documents and Tracking APIs also accept the account login/password.

```php
use Scraper\Scraper\Client;
use Scraper\ScraperColissimo\Model\Credential;
use Symfony\Component\HttpClient\HttpClient;

$client = new Client(HttpClient::create());
$credential = Credential::apiKey('123A123BC1234D12345');
// Documents & tracking only: Credential::login('123456', 'password');
```

Every call returns a typed object or throws:

- `ColissimoResponseException`: functional error returned by Colissimo (`getMessages()`, `getErrorCodes()`, `getStatusCode()`),
- `ColissimoResponseUnknownException`: unreadable response (gateway error, empty body...).

Create a label
--------------

```php
use Scraper\ScraperColissimo\Model\Label\GenerateLabel;
use Scraper\ScraperColissimo\Model\Label\OutputFormat;
use Scraper\ScraperColissimo\Model\Label\OutputPrintingType;
use Scraper\ScraperColissimo\Model\Label\ProductCode;
use Scraper\ScraperColissimo\Request\ColissimoGenerateLabelRequest;

$generateLabel = new GenerateLabel(new OutputFormat(OutputPrintingType::PDF_10X15_300DPI));

$service = $generateLabel->letter->service;
$service->productCode = ProductCode::DOS;
$service->depositDate = new \DateTimeImmutable('tomorrow');
$service->orderNumber = 'CMD-42';

$generateLabel->letter->parcel->weight = 1.2; // kg

$sender = $generateLabel->letter->sender->address;
$sender->companyName = 'My shop';
$sender->line2 = '1 rue de la Paix';
$sender->zipCode = '75002';
$sender->city = 'Paris';

$addressee = $generateLabel->letter->addressee->address;
$addressee->lastName = 'Dupont';
$addressee->firstName = 'Jean';
$addressee->line2 = '4 rue de la Croix-Rouge';
$addressee->zipCode = '75015';
$addressee->city = 'Paris';
$addressee->email = 'jean@example.com';
$addressee->mobileNumber = '0612345678';

/** @var \Scraper\ScraperColissimo\Model\Label\LabelResult $result */
$result = $client->send(new ColissimoGenerateLabelRequest($credential, $generateLabel));

$result->parcelNumber; // "6C00000000000"
file_put_contents($result->parcelNumber . '.pdf', $result->label);
```

Optional fields left to `null` are not sent to Colissimo, as recommended by the documentation.
The SLS response (MTOM/XOP `multipart/mixed`) is parsed using the parts `Content-ID` (`jsonInfos`, `label`, `cn23`),
never their position.

### Shipment to the United States (and other CN23 destinations)

Since August 2025, shipments to the United States without DDP require: the sender EORI (2 letters + 9 digits),
the two-letter state code, the addressee mobile number, and articles described in English.

```php
use Scraper\ScraperColissimo\Model\Label\Address;
use Scraper\ScraperColissimo\Model\Label\Article;
use Scraper\ScraperColissimo\Model\Label\Category;
use Scraper\ScraperColissimo\Model\Label\Contents;
use Scraper\ScraperColissimo\Model\Label\CustomsDeclarations;

$generateLabel->letter->service->productCode = ProductCode::DOS;
$generateLabel->letter->service->totalAmount = 1500; // shipping costs in cents, mandatory with a CN23

$addressee = new Address('US', '10118');
$addressee->lastName = 'Doe';
$addressee->firstName = 'John';
$addressee->line2 = '350 5th Ave';
$addressee->city = 'New York';
$addressee->stateOrProvinceCode = 'NY';
$addressee->mobileNumber = '+12125550123';
$generateLabel->letter->addressee->address = $addressee;

$article = new Article('Cotton t-shirt', quantity: 2, weight: 0.5, value: 25.0);
$article->hsCode = '610910';
$article->originCountry = 'FR';
$article->currency = 'EUR';

$customs = new CustomsDeclarations(true, new Contents(Category::COMMERCIAL)->addArticle($article));
$customs->invoiceNumber = 'INV-42';
$generateLabel->letter->customsDeclarations = $customs;

$generateLabel
    ->setEori('FR123456789')
    // optional: label + CN23 on the same page ("_UL" format identical to the label format)
    ->setCn23OutputPrintingType(OutputPrintingType::PDF_10X15_300DPI_UL)
;
$generateLabel->outputFormat->outputPrintingType = OutputPrintingType::PDF_10X15_300DPI_UL;

$result = $client->send(new ColissimoGenerateLabelRequest($credential, $generateLabel));
$result->label;
$result->cn23; // CN23 PDF when not unified
```

Other `fields` helpers: `setDimensions()`, `setAccountNumber()` (delegated accounts), `setField(FieldKey::..., $value)`.

### Multi-parcel shipments

Generate the follower parcels first, then the master parcel referencing them (5 parcels at most):

```php
$followers = [];

for ($i = 1; $i < $total; ++$i) {
    $label = $buildLabel($i)->setMultiParcelFollower($i, $total);
    $followers[] = $client->send(new ColissimoGenerateLabelRequest($credential, $label))->parcelNumber;
}

$master = $buildLabel($total)->setMultiParcelMaster($total, $total, $followers);
$client->send(new ColissimoGenerateLabelRequest($credential, $master));
```

### Reprint a label

```php
use Scraper\ScraperColissimo\Request\ColissimoGetLabelRequest;

$result = $client->send(new ColissimoGetLabelRequest($credential, '6A00000000001', OutputPrintingType::ZPL_10X15_203DPI));
```

Dematerialized invoices and CN23
--------------------------------

Customs documents of overseas and DDP/FTD parcels can be sent to Colissimo instead of being printed (500 Ko max):

```php
use Scraper\ScraperColissimo\Model\Document\Document;
use Scraper\ScraperColissimo\Model\Document\DocumentType;
use Scraper\ScraperColissimo\Request\ColissimoStoreDocumentRequest;
use Scraper\ScraperColissimo\Request\ColissimoUpdateDocumentRequest;

$invoice = Document::fromFile($parcelNumber, DocumentType::COMMERCIAL_INVOICE, '/path/to/invoice.pdf');
// multi-parcel: document attached to the master parcel and its followers
$invoice->parcelNumberList = $followers;

$result = $client->send(new ColissimoStoreDocumentRequest($credential, '123456' /* account number */, $invoice));
$result->documentId;

$cn23 = new Document($parcelNumber, DocumentType::CN23, $parcelNumber . '-CN23.pdf', $labelResult->cn23);
$client->send(new ColissimoStoreDocumentRequest($credential, '123456', $cn23));

// Replace an already stored document of the same type
$client->send(new ColissimoUpdateDocumentRequest($credential, '123456', $invoice));
```

Tracking
--------

```php
use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Model\Tracking\Timeline;
use Scraper\ScraperColissimo\Request\ColissimoTrackingTimelineRequest;

foreach ($parcelNumbers as $parcelNumber) {
    try {
        /** @var Timeline $timeline */
        $timeline = $client->send(new ColissimoTrackingTimelineRequest($credential, $parcelNumber, ColissimoTrackingTimelineRequest::LANG_FR));
    } catch (ColissimoResponseException $exception) {
        // e.g. 105: unknown parcel number
        continue;
    }

    $timeline->getCurrentStep()?->stepId; // Step::ANNOUNCEMENT (0) ... Step::DELIVERED (5)
    $timeline->isDelivered();
    $lastEvent = $timeline->getLastEvent();
    $lastEvent?->code;       // "PCHCFM"
    $lastEvent?->labelLong;
    $lastEvent?->getDate();  // \DateTimeImmutable (Europe/Paris)
    $timeline->getEvents();  // every event, most recent first
    $timeline->parcel?->removalPoint; // pick-up point
}
```

Upgrade from 2.x
----------------

Version 3 is a rewrite on the SLS REST v3.1 web service:

- authentication uses the Colissimo Box API key (`Credential::apiKey()`) instead of the contract number/password,
- `ColissimoGenerateLabelRequest::__construct(Credential $credential, GenerateLabel $generateLabel)` replaces
  `__construct(string $contractNumber, string $password)` and `getGenerateLabelRequest()` becomes `getGenerateLabel()`,
- the `Rest\*` getters/setters classes are replaced by the `Model\Label\*` classes with public properties
  (`Rest\GenerateLabelRequest` → `Model\Label\GenerateLabel`, `Rest\Parcel::setCOD()` → `Parcel::$cod`, ...),
- constants moved: `Rest\Service::DOM` → `ProductCode::DOM`, `Rest\OutputFormat::PDF_10X15_300DPI` →
  `OutputPrintingType::PDF_10X15_300DPI`, `Rest\Category::GIFT` → `Category::GIFT` (now an integer),
- `ColissimoGenerateLabel` (`->response->labelResponse->parcelNumber`, `->file`, `->cn23`) is replaced by
  `LabelResult` (`->parcelNumber`, `->label`, `->cn23`, `->messages`),
- `Adapter\ColissimoAdapter` and the `Entity\*` classes are removed,
- `ColissimoResponseException::getData()` is replaced by `getMessages()`.

Documentation
-------------

- SLS web service: https://www.colissimo.fr/doc-colissimo/redoc-sls/fr
- Documents API: https://www.colissimo.entreprise.laposte.fr/sites/default/files/2021-04/WS-Documents_FR.pdf
- Timeline tracking web service: "Specifications Timeline Tracking Web Service" v2.6
