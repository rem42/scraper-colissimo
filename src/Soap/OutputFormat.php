<?php

namespace Scraper\ScraperColissimo\Soap;

final class OutputFormat
{
    public static string $ZPL_10X15_203DPI             = 'ZPL_10x15_203dpi';
    public static string $ZPL_10X15_300DPI             = 'ZPL_10x15_300dpi';
    public static string $DPL_10X15_203DPI             = 'DPL_10x15_203dpi';
    public static string $DPL_10X15_300DPI             = 'DPL_10x15_300dpi';
    public static string $PDF_10X15_300DPI             = 'PDF_10x15_300dpi';
    public static string $PDF_A4_300DPI                = 'PDF_A4_300dpi';
    public static string $RETURNTYPE_SENDPDFBYMAIL     = 'SendPDFByMail';
    public static string $RETURNTYPE_SENDPDFLINKBYMAIL = 'SendPDFLinkByMail';

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

    public function setReturnType(?string $returnType = null): self
    {
        $this->returnType = $returnType;

        return $this;
    }
}
