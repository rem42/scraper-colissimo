<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class OutputFormat
{
    /** @Serializer\Exclude() */
    public static string $ZPL_10X15_203DPI = 'ZPL_10x15_203dpi';
    /** @Serializer\Exclude() */
    public static string $ZPL_10X15_300DPI = 'ZPL_10x15_300dpi';
    /** @Serializer\Exclude() */
    public static string $DPL_10X15_203DPI = 'DPL_10x15_203dpi';
    /** @Serializer\Exclude() */
    public static string $DPL_10X15_300DPI = 'DPL_10x15_300dpi';
    /** @Serializer\Exclude() */
    public static string $PDF_10X15_300DPI = 'PDF_10x15_300dpi';
    /** @Serializer\Exclude() */
    public static string $PDF_A4_300DPI = 'PDF_A4_300dpi';
    /** @Serializer\Exclude() */
    public static string $RETURNTYPE_SENDPDFBYMAIL = 'SendPDFByMail';
    /** @Serializer\Exclude() */
    public static string $RETURNTYPE_SENDPDFLINKBYMAIL = 'SendPDFLinkByMail';
    /**
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("x")
     */
    protected int $x = 0;
    /**
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("y")
     */
    protected int $y = 0;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("outputPrintingType")
     */
    protected string $outputPrintingType;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("returnType")
     */
    protected string $returnType;

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getOutputPrintingType(): ?string
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

    public function setReturnType(string $returnType): self
    {
        $this->returnType = $returnType;

        return $this;
    }
}
