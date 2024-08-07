<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class OutputFormat
{
    public const ZPL_10X15_203DPI = 'ZPL_10x15_203dpi';
    public const ZPL_10X15_300DPI = 'ZPL_10x15_300dpi';
    public const DPL_10X15_203DPI = 'DPL_10x15_203dpi';
    public const DPL_10X15_300DPI = 'DPL_10x15_300dpi';
    public const PDF_10X15_300DPI = 'PDF_10x15_300dpi';
    public const PDF_A4_300DPI = 'PDF_A4_300dpi';
    public const RETURNTYPE_SENDPDFBYMAIL = 'SendPDFByMail';
    public const RETURNTYPE_SENDPDFLINKBYMAIL = 'SendPDFLinkByMail';

    private int $x = 0;

    private int $y = 0;

    private string $outputPrintingType;

    private ?string $returnType = null;

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getOutputPrintingType(): string
    {
        return $this->outputPrintingType;
    }

    public function setOutputPrintingType(string $outputPrintingType): self
    {
        $this->outputPrintingType = $outputPrintingType;

        return $this;
    }

    public function getReturnType(): ?string
    {
        return $this->returnType;
    }

    public function setReturnType(string $returnType = null): self
    {
        $this->returnType = $returnType;

        return $this;
    }
}
