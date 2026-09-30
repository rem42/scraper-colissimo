<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Address
{
    public ?string $companyName = null;
    public ?string $lastName = null;
    public ?string $firstName = null;
    // Floor, corridor, staircase, apartment
    public ?string $line0 = null;
    // Entrance, building, residence
    public ?string $line1 = null;
    // Street number and name
    public ?string $line2 = null;
    // Locality or other mention
    public ?string $line3 = null;
    public ?string $city = null;
    public ?string $phoneNumber = null;
    // Strongly recommended, mandatory for the United States (tracking notifications by SMS)
    public ?string $mobileNumber = null;
    public ?string $doorCode1 = null;
    public ?string $doorCode2 = null;
    public ?string $intercom = null;
    public ?string $email = null;
    public ?string $language = null;
    // Two-letter state/province code, mandatory for the United States (e.g. "NY")
    public ?string $stateOrProvinceCode = null;

    public function __construct(
        // ISO 3166-1 alpha-2 country code
        public string $countryCode = 'FR',
        public string $zipCode = '',
    ) {}
}
