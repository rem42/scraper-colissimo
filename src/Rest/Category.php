<?php

namespace Scraper\ScraperColissimo\Rest;

final class Category
{
    public static string $GIFT = '1';

    public static string $COMMERCIAL_SAMPLE = '2';

    public static string $COMMERCIAL = '3';

    public static string $DOCUMENT = '4';

    public static string $OTHER = '5';

    public static string $MERCHANDISE_RETURN = '6';

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
