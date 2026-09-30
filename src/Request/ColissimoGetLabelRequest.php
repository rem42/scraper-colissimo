<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Label\OutputPrintingType;

/**
 * Prints (or reprints) the label of an existing parcel. The CN23 is not regenerated.
 */
#[Scraper(path: 'getLabel')]
class ColissimoGetLabelRequest extends ColissimoSlsRequest
{
    public function __construct(
        Credential $credential,
        protected string $parcelNumber,
        protected string $outputPrintingType = OutputPrintingType::PDF_10X15_300DPI,
    ) {
        parent::__construct($credential);
    }

    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    protected function getPayload(): array
    {
        return [
            'parcelNumber' => $this->parcelNumber,
            'outputPrintingType' => $this->outputPrintingType,
        ];
    }
}
