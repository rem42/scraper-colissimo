<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Api;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Api\ColissimoGenerateLabelApi;
use Scraper\ScraperColissimo\Api\ColissimoSlsApi;
use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Exception\ColissimoResponseUnknownException;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Label\Address;
use Scraper\ScraperColissimo\Model\Label\Article;
use Scraper\ScraperColissimo\Model\Label\Category;
use Scraper\ScraperColissimo\Model\Label\Contents;
use Scraper\ScraperColissimo\Model\Label\CustomsDeclarations;
use Scraper\ScraperColissimo\Model\Label\GenerateLabel;
use Scraper\ScraperColissimo\Model\Label\LabelResult;
use Scraper\ScraperColissimo\Model\Label\OutputFormat;
use Scraper\ScraperColissimo\Model\Label\OutputPrintingType;
use Scraper\ScraperColissimo\Model\Label\ProductCode;
use Scraper\ScraperColissimo\Request\ColissimoGenerateLabelRequest;
use Scraper\ScraperColissimo\Request\ColissimoSlsRequest;
use Scraper\ScraperColissimo\Tests\ClientTrait;

/**
 * @internal
 */
#[CoversClass(ColissimoGenerateLabelApi::class)]
#[CoversClass(ColissimoSlsApi::class)]
#[CoversClass(ColissimoGenerateLabelRequest::class)]
#[CoversClass(ColissimoSlsRequest::class)]
final class ColissimoGenerateLabelApiTest extends TestCase
{
    use ClientTrait;

    // Real SLS v3.1 response: the label block is named "labelV31Response"
    private const string SUCCESS_JSON = '{"messages":[{"id":"0","type":"INFOS","messageContent":"La requête a été traitée avec succès","replacementValues":[]}],"labelXmlV2Reponse":null,"labelV31Response":{"parcelNumber":"6A07905668182","parcelNumberPartner":"0031410116A0790566818801250U","pdfUrl":null,"fields":{"field":[{"key":"NETWORK_NAME","value":""},{"key":"PARTNER_NAME","value":""},{"key":"PARTNER_CAB","value":""},{"key":"CN23_THERMIQUE","value":""}],"customField":[{"key":"NETWORK_NAME","value":""},{"key":"PARTNER_NAME","value":""},{"key":"PARTNER_CAB","value":""},{"key":"CN23_THERMIQUE","value":""}]}}}';

    public function testUnitedStatesLabelWithCn23(): void
    {
        $content = self::multipart('uuid:9c80b689', self::SUCCESS_JSON, ['label' => '%PDF-label', 'cn23' => '%PDF-cn23']);
        $client = $this->createClient($content, 200, ['content-type' => ['multipart/mixed; boundary="uuid:9c80b689"; type="application/json"']]);

        $result = $client->send(new ColissimoGenerateLabelRequest(Credential::apiKey('my-api-key'), self::createUnitedStatesLabel()));

        $this->assertInstanceOf(LabelResult::class, $result);
        $this->assertSame('6A07905668182', $result->parcelNumber);
        $this->assertSame('0031410116A0790566818801250U', $result->parcelNumberPartner);
        $this->assertNull($result->pdfUrl);
        $this->assertSame('%PDF-label', $result->label);
        $this->assertSame('%PDF-cn23', $result->cn23);
        $this->assertTrue($result->hasCn23());
        $this->assertSame(['NETWORK_NAME' => '', 'PARTNER_NAME' => '', 'PARTNER_CAB' => '', 'CN23_THERMIQUE' => ''], $result->fields);
        $this->assertCount(1, $result->messages);

        $this->assertNotNull($this->lastRequest);
        $this->assertSame('POST', $this->lastRequest['method']);
        $this->assertSame('https://ws.colissimo.fr/sls-ws/SlsServiceWSRest/3.1/generateLabel', $this->lastRequest['url']);
        $this->assertSame('my-api-key', $this->lastRequest['options']['headers']['apiKey']);

        $this->assertIsString($this->lastRequest['options']['body']);
        $body = json_decode($this->lastRequest['options']['body'], true, 512, \JSON_THROW_ON_ERROR);

        // Optional fields left to null must not be sent
        $this->assertEquals([
            'outputFormat' => ['outputPrintingType' => 'PDF_10x15_300dpi_UL', 'x' => 0, 'y' => 0],
            'letter' => [
                'service' => ['productCode' => 'DOS', 'depositDate' => '2026-10-01', 'totalAmount' => 1500, 'orderNumber' => 'CMD-42'],
                'parcel' => ['weight' => 1.2],
                'customsDeclarations' => [
                    'invoiceNumber' => 'INV-42',
                    'contents' => [
                        'article' => [
                            ['description' => 'Cotton t-shirt', 'quantity' => 2, 'weight' => 0.5, 'value' => 25.0, 'hsCode' => '610910', 'originCountry' => 'FR', 'currency' => 'EUR'],
                        ],
                        'category' => ['value' => 3],
                    ],
                    'includeCustomsDeclarations' => true,
                ],
                'sender' => ['address' => ['companyName' => 'My shop', 'line2' => '1 rue de la Paix', 'city' => 'Paris', 'countryCode' => 'FR', 'zipCode' => '75002']],
                'addressee' => ['address' => ['lastName' => 'Doe', 'firstName' => 'John', 'line2' => '350 5th Ave', 'city' => 'New York', 'mobileNumber' => '+12125550123', 'email' => 'john@example.com', 'stateOrProvinceCode' => 'NY', 'countryCode' => 'US', 'zipCode' => '10118']],
            ],
            'fields' => ['field' => [
                ['key' => 'EORI', 'value' => 'FR123456789'],
                ['key' => 'OUTPUT_PRINT_TYPE_CN23', 'value' => 'PDF_10x15_300dpi_UL'],
            ]],
        ], $body);
    }

    public function testPlainJsonError(): void
    {
        $client = $this->createClient('{"messages":[{"id":"30562","type":"ERROR","messageContent":"Le format du numéro EORI est invalide","replacementValues":[]}],"labelXmlV2Reponse":null,"labelV2Response":null}', 400, ['content-type' => ['application/json']]);

        try {
            $client->send(new ColissimoGenerateLabelRequest(Credential::apiKey('key'), self::createUnitedStatesLabel()));
            $this->fail('An exception should have been thrown');
        } catch (ColissimoResponseException $exception) {
            $this->assertSame('Colissimo request error: [30562] Le format du numéro EORI est invalide', $exception->getMessage());
            $this->assertSame(['30562'], $exception->getErrorCodes());
            $this->assertSame(400, $exception->getStatusCode());
        }
    }

    public function testMultipartError(): void
    {
        $content = self::multipart('uuid:30e51902', '{"messages":[{"id":"30000","type":"ERROR","messageContent":"Identifiant ou mot de passe invalide","replacementValues":[]}],"labelV2Response":null}');
        $client = $this->createClient($content, 400);

        $this->expectException(ColissimoResponseException::class);
        $this->expectExceptionMessage('[30000] Identifiant ou mot de passe invalide');

        $client->send(new ColissimoGenerateLabelRequest(Credential::apiKey('key'), self::createUnitedStatesLabel()));
    }

    public function testUnknownResponse(): void
    {
        $client = $this->createClient('<html>Bad gateway</html>', 502);

        $this->expectException(ColissimoResponseUnknownException::class);

        $client->send(new ColissimoGenerateLabelRequest(Credential::apiKey('key'), self::createUnitedStatesLabel()));
    }

    public function testApiKeyIsRequired(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new ColissimoGenerateLabelRequest(Credential::login('login', 'password'));
    }

    private static function createUnitedStatesLabel(): GenerateLabel
    {
        $generateLabel = new GenerateLabel(new OutputFormat(OutputPrintingType::PDF_10X15_300DPI_UL));

        $service = $generateLabel->letter->service;
        $service->productCode = ProductCode::DOS;
        $service->depositDate = new \DateTimeImmutable('2026-10-01');
        $service->totalAmount = 1500;
        $service->orderNumber = 'CMD-42';

        $generateLabel->letter->parcel->weight = 1.2;

        $sender = $generateLabel->letter->sender->address;
        $sender->companyName = 'My shop';
        $sender->line2 = '1 rue de la Paix';
        $sender->city = 'Paris';
        $sender->zipCode = '75002';

        $addressee = new Address('US', '10118');
        $addressee->lastName = 'Doe';
        $addressee->firstName = 'John';
        $addressee->line2 = '350 5th Ave';
        $addressee->city = 'New York';
        $addressee->stateOrProvinceCode = 'NY';
        $addressee->mobileNumber = '+12125550123';
        $addressee->email = 'john@example.com';
        $generateLabel->letter->addressee->address = $addressee;

        $article = new Article('Cotton t-shirt', 2, 0.5, 25.0);
        $article->hsCode = '610910';
        $article->originCountry = 'FR';
        $article->currency = 'EUR';

        $customsDeclarations = new CustomsDeclarations(true, new Contents(Category::COMMERCIAL)->addArticle($article));
        $customsDeclarations->invoiceNumber = 'INV-42';
        $generateLabel->letter->customsDeclarations = $customsDeclarations;

        return $generateLabel
            ->setEori('FR123456789')
            ->setCn23OutputPrintingType(OutputPrintingType::PDF_10X15_300DPI_UL)
        ;
    }
}
