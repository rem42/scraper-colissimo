<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

/**
 * Nature of the shipment, mandatory for parcels requiring a CN23.
 */
final class Category
{
    public const int GIFT = 1;
    public const int COMMERCIAL_SAMPLE = 2;
    public const int COMMERCIAL = 3;
    public const int DOCUMENT = 4;
    public const int OTHER = 5;
    public const int MERCHANDISE_RETURN = 6;

    public function __construct(
        public int $value = self::COMMERCIAL,
    ) {}
}
