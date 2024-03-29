<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Fields
{
    private Field $field;

    public function __construct()
    {
        $this->field = new Field();
    }

    public function getField(): ?Field
    {
        return $this->field;
    }
}
