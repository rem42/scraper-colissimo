<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Article
{
    // 6, 8 or 10 digits harmonized system code
    public ?string $hsCode = null;
    // ISO country code of origin, mandatory for commercial shipments (category 3)
    public ?string $originCountry = null;
    public ?string $originCountryLabel = null;
    // Defaults to EUR
    public ?string $currency = null;
    public ?string $artref = null;
    public ?string $originalIdent = null;
    public ?float $vatAmount = null;
    public ?float $customsFees = null;

    public function __construct(
        // Detailed description, in English for the United States and DDP shipments (max 64 characters)
        public string $description,
        public int $quantity,
        // Unit net weight in kg
        public float $weight,
        // Unit value
        public float $value,
    ) {}
}
