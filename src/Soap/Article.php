<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Article
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("description")
     */
    protected string $description;
    /**
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("quantity")
     */
    protected int $quantity;
    /**
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("weight")
     */
    protected float $weight;
    /**
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("value")
     */
    protected int $value;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("hsCode")
     */
    protected string $hsCode;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("originCountry")
     */
    protected string $originCountry;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("currency")
     */
    protected string $currency;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("artref")
     */
    protected string $artref;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("originalIdent")
     */
    protected string $originalIdent;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getHsCode(): ?string
    {
        return $this->hsCode;
    }

    public function setHsCode(string $hsCode): self
    {
        $this->hsCode = $hsCode;

        return $this;
    }

    public function getOriginCountry(): ?string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(string $originCountry): self
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getArtref(): ?string
    {
        return $this->artref;
    }

    public function setArtref(string $artref): self
    {
        $this->artref = $artref;

        return $this;
    }

    public function getOriginalIdent(): ?string
    {
        return $this->originalIdent;
    }

    public function setOriginalIdent(string $originalIdent): self
    {
        $this->originalIdent = $originalIdent;

        return $this;
    }
}
