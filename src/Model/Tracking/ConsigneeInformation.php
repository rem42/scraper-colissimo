<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

final class ConsigneeInformation
{
    public ?string $companyName = null;
    public ?string $civility = null;
    public ?string $name = null;
    public ?string $firstName = null;
    public ?TrackingAddress $address = null;
    public ?string $mobilePhone = null;
    public ?string $email = null;
}
