<?php

namespace Scraper\ScraperColissimo\Soap;

final class GenerateLabel
{
    private GenerateLabelRequest $generateLabelRequest;

    public function __construct()
    {
        $this->generateLabelRequest = new GenerateLabelRequest();
    }

    public function getGenerateLabelRequest(): GenerateLabelRequest
    {
        return $this->generateLabelRequest;
    }
}
