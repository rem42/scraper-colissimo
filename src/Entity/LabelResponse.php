<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

class LabelResponse
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("parcelNumber")
     */
    protected string $parcelNumber;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("parcelNumberPartner")
     */
    protected string $parcelNumberPartner;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("pdfUrl")
     */
    protected string $pdfUrl;

    public function getParcelNumber(): ?string
    {
        return $this->parcelNumber;
    }

    public function getParcelNumberPartner(): ?string
    {
        return $this->parcelNumberPartner;
    }

    public function getPdfUrl(): ?string
    {
        return $this->pdfUrl;
    }
}
