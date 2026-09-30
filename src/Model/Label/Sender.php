<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Sender
{
    // Sender reference displayed on the label only (max 17 characters)
    public ?string $senderParcelRef = null;

    public Address $address;

    public function __construct(?Address $address = null)
    {
        $this->address = $address ?? new Address();
    }
}
