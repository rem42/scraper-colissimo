<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class OutputFormat
{
    public const string RETURN_TYPE_SEND_PDF_BY_MAIL = 'SendPDFByMail';
    public const string RETURN_TYPE_SEND_PDF_LINK_BY_MAIL = 'SendPDFLinkByMail';

    public function __construct(
        public string $outputPrintingType = OutputPrintingType::PDF_10X15_300DPI,
        // Horizontal offset in points (-9999..9999)
        public int $x = 0,
        // Vertical offset in points (-120..120)
        public int $y = 0,
        // Colissimo Retour only: also send the label by e-mail
        public ?string $returnType = null,
        // Print the CRBT (cash on delivery) document
        public ?bool $printCODDocument = null,
    ) {}
}
