<?php

namespace Scraper\ScraperColissimo\Soap;

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
