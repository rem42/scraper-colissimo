<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\RequestBody;
use Scraper\Scraper\Request\RequestHeaders;
use Scraper\ScraperColissimo\Http\MultipartFormData;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Document\Document;

/**
 * Documents API: dematerialized customs documents (commercial invoice, CN23...) for overseas and DDP/FTD parcels.
 */
#[Scraper(path: '/api-document/rest')]
abstract class ColissimoDocumentRequest extends ColissimoRequest implements RequestHeaders, RequestBody
{
    private readonly MultipartFormData $formData;

    public function __construct(
        Credential $credential,
        // Colissimo account number ("code tiers")
        protected readonly string $accountNumber,
        protected readonly Document $document,
    ) {
        parent::__construct($credential);

        $this->formData = new MultipartFormData()
            ->addField('accountNumber', $this->accountNumber)
            ->addField('parcelNumber', $this->document->parcelNumber)
            ->addField('documentType', $this->document->documentType)
            ->addField('filename', $this->document->filename)
        ;

        if ([] !== $this->document->parcelNumberList) {
            $this->formData->addField('parcelNumberList', implode(',', $this->document->parcelNumberList));
        }

        $this->formData->addFile('file', $this->document->filename, $this->document->content, $this->document->contentType);
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function getHeaders(): array
    {
        return [
            ...$this->credential->toArray(),
            'Content-Type' => $this->formData->getContentType(),
            'Accept' => 'application/json',
        ];
    }

    public function getBody(): string
    {
        return $this->formData->getBody();
    }
}
