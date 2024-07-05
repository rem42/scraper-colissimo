<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Category
{
    public const GIFT = '1';

    public const COMMERCIAL_SAMPLE = '2';

    public const COMMERCIAL = '3';

    public const DOCUMENT = '4';

    public const OTHER = '5';

    public const MERCHANDISE_RETURN = '6';

    private string $value;

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
