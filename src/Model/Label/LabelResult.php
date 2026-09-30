<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

use Scraper\ScraperColissimo\Model\Message;

/**
 * Result of generateLabel / getLabel: the JSON information and the binary attachments (label, CN23, proforma).
 */
final class LabelResult
{
    /** @var list<Message> */
    public array $messages = [];

    public ?string $parcelNumber = null;

    public ?string $parcelNumberPartner = null;

    public ?string $pdfUrl = null;

    /** @var array<string, string> fields returned by Colissimo */
    public array $fields = [];

    /** Label in the requested output format (PDF, ZPL or DPL) */
    public ?string $label = null;

    /** CN23 customs declaration (PDF unless OUTPUT_PRINT_TYPE_CN23 requests another format) */
    public ?string $cn23 = null;

    public ?string $proforma = null;

    public function hasCn23(): bool
    {
        return null !== $this->cn23 && '' !== $this->cn23;
    }
}
