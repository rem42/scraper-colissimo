<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Category
{
    /** @Serializer\Exclude() */
    public static string $GIFT = '1';
    /** @Serializer\Exclude() */
    public static string $COMMERCIAL_SAMPLE = '2';
    /** @Serializer\Exclude() */
    public static string $COMMERCIAL = '3';
    /** @Serializer\Exclude() */
    public static string $DOCUMENT = '4';
    /** @Serializer\Exclude() */
    public static string $OTHER = '5';
    /** @Serializer\Exclude() */
    public static string $MERCHANDISE_RETURN = '6';

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("value")
     */
    protected string $value;

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
