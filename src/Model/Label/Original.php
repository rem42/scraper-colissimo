<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

/**
 * Original shipment data, mandatory for international (7R) and overseas (5R) returns.
 */
final class Original
{
    public ?string $originalIdent = null;
    public ?string $originalInvoiceNumber = null;
    public ?\DateTimeInterface $originalInvoiceDate = null;
    public ?string $originalParcelNumber = null;
}
