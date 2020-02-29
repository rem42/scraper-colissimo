<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class GenerateLabel
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\GenerateLabelRequest")
     * @Serializer\SerializedName("generateLabelRequest")
     */
    protected GenerateLabelRequest $generateLabelRequest;

    public function __construct()
    {
        $this->generateLabelRequest = new GenerateLabelRequest();
    }

    public function getGenerateLabelRequest(): ?GenerateLabelRequest
    {
        return $this->generateLabelRequest;
    }
}
