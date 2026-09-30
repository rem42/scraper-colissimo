<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

final class TrackingAddress
{
    public ?string $address0 = null;
    public ?string $address1 = null;
    public ?string $address2 = null;
    public ?string $address3 = null;
    public ?string $zipCode = null;
    public ?string $city = null;
    public ?string $countryCodeISO = null;
}
