<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

final class Event
{
    public ?string $date = null;
    public ?string $code = null;
    public ?string $labelShort = null;
    public ?string $labelLong = null;
    public ?string $siteCode = null;
    public ?string $siteName = null;
    public ?string $siteZipCode = null;

    public function getDate(): ?\DateTimeImmutable
    {
        return TrackingDate::parse($this->date);
    }
}
