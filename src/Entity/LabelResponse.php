<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Entity;

final class LabelResponse
{
    public string $parcelNumber;
    public ?string $parcelNumberPartner = null;
    public ?string $pdfUrl = null;
}
