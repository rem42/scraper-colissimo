<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

final class Step
{
    public const int ANNOUNCEMENT = 0;
    public const int PROCESSING = 1;
    public const int ROUTING = 2;
    public const int ARRIVAL_ON_SITE = 3;
    public const int DELIVERY = 4;
    public const int DELIVERED = 5;

    public const string STATUS_ACTIVE = 'STEP_STATUS_ACTIVE';
    public const string STATUS_INACTIVE = 'STEP_STATUS_INACTIVE';
    public const string STATUS_DISABLED = 'STEP_STATUS_DISABLED';

    public int $stepId = 0;
    public ?string $type = null;
    public ?string $labelShort = null;
    public ?string $labelLong = null;
    public ?string $status = null;
    public ?string $countryCodeISO = null;
    public ?string $date = null;

    public function isActive(): bool
    {
        return self::STATUS_ACTIVE === $this->status;
    }

    public function getDateTime(): ?\DateTimeImmutable
    {
        return TrackingDate::parse($this->date);
    }
}
