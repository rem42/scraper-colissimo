<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

final class TimelineStatus
{
    public const string SUCCESS = '0';

    public string $code = '';
    public ?string $message = null;

    public function isSuccess(): bool
    {
        return self::SUCCESS === $this->code;
    }
}
