<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

/**
 * Pick-up point where the parcel can be collected.
 */
final class RemovalPoint
{
    public ?string $siteName = null;
    public ?string $siteCode = null;
    public ?string $endOfWithdrawDate = null;
    public ?string $address0 = null;
    public ?string $address1 = null;
    public ?string $address2 = null;
    public ?string $address3 = null;
    public ?string $zipCode = null;
    public ?string $city = null;
    public ?string $countryName = null;
    public ?string $countryCodeISO = null;

    public function getEndOfWithdrawDateTime(): ?\DateTimeImmutable
    {
        return TrackingDate::parse($this->endOfWithdrawDate);
    }
}
