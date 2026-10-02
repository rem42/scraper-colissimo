<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class CustomsDeclarations
{
    // Number of CN23 copies (1 to 4, default 4)
    public ?int $numberOfCopies = null;
    public ?string $importersReference = null;
    public ?string $importersContact = null;
    public ?string $officeOrigin = null;
    public ?string $comments = null;
    // Generic description of the articles in English, mandatory for DDP shipments
    public ?string $description = null;
    // Invoice number displayed on the CN23
    public ?string $invoiceNumber = null;
    public ?string $licenceNumber = null;
    public ?string $certificatNumber = null;
    public ?Address $importerAddress = null;

    public Contents $contents;

    public function __construct(
        // Return the CN23 PDF in the web service response
        public bool $includeCustomsDeclarations = true,
        ?Contents $contents = null,
    ) {
        $this->contents = $contents ?? new Contents();
    }
}
