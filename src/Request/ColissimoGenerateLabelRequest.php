<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Label\GenerateLabel;

/**
 * Creates a shipment: parcel announcement + label + customs declaration (CN23).
 */
#[Scraper(path: 'generateLabel')]
class ColissimoGenerateLabelRequest extends ColissimoSlsRequest
{
    public function __construct(
        Credential $credential,
        protected GenerateLabel $generateLabel = new GenerateLabel(),
    ) {
        parent::__construct($credential);
    }

    public function getGenerateLabel(): GenerateLabel
    {
        return $this->generateLabel;
    }

    protected function getPayload(): GenerateLabel
    {
        return $this->generateLabel;
    }
}
