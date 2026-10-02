<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

/**
 * Tracking dates are returned without timezone (e.g. "2020-03-03T09:09:00.000"), in French local time.
 */
final class TrackingDate
{
    public const string TIMEZONE = 'Europe/Paris';

    public static function parse(?string $date): ?\DateTimeImmutable
    {
        if (null === $date || '' === trim($date)) {
            return null;
        }

        try {
            return new \DateTimeImmutable($date, new \DateTimeZone(self::TIMEZONE));
        } catch (\Exception) {
            return null;
        }
    }
}
