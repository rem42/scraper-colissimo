<?php

namespace Scraper\ScraperColissimo\Rest;

final class Body
{
    private GenerateLabel $generateLabel;

    public function __construct()
    {
        $this->generateLabel = new GenerateLabel();
    }

    public function getGenerateLabel(): GenerateLabel
    {
        return $this->generateLabel;
    }
}
