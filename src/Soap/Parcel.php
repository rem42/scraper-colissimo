<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Parcel
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("weight")
     */
    protected string $weight;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("pickupLocationId")
     */
    protected string $pickupLocationId;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ftd")
     */
    protected bool $ftd;

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPickupLocationId(): ?string
    {
        return $this->pickupLocationId;
    }

    public function setPickupLocationId(string $pickupLocationId): self
    {
        $this->pickupLocationId = $pickupLocationId;

        return $this;
    }

    public function isFtd(): ?bool
    {
        return $this->ftd;
    }

    public function setFtd(bool $ftd): self
    {
        $this->ftd = $ftd;

        return $this;
    }
}
