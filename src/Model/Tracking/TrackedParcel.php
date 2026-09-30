<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

final class TrackedParcel
{
    public ?string $parcelNumber = null;
    public ?string $parcelNumberAVPI = null;
    public ?string $parcelNumberInstance = null;
    public ?string $contractNumber = null;
    public ?string $customerParcelReference = null;
    public ?string $coclico = null;
    public ?string $measuredWeight = null;
    public ?string $measuredDimension = null;
    public ?ConsigneeInformation $consigneeInformation = null;
    public ?RemovalPoint $removalPoint = null;
    public ?TrackingService $service = null;

    /** @var list<Step> */
    public array $step = [];

    /** @var list<Event> */
    public array $event = [];
}
