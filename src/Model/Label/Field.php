<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Field
{
    public function __construct(
        public string $key,
        public string $value,
    ) {}
}
