<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Addressee
{
    // Addressee reference displayed on the label only (max 15 characters)
    public ?string $addresseeParcelRef = null;
    public ?bool $codeBarForReference = null;
    public ?string $serviceInfo = null;

    public Address $address;

    public function __construct(?Address $address = null)
    {
        $this->address = $address ?? new Address();
    }
}
