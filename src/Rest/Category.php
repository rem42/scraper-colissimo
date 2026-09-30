<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Category
{
    public const string GIFT = '1';

    public const string COMMERCIAL_SAMPLE = '2';

    public const string COMMERCIAL = '3';

    public const string DOCUMENT = '4';

    public const string OTHER = '5';

    public const string MERCHANDISE_RETURN = '6';

    private string $value;

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
