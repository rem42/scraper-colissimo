<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Parcel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("weight")
     */
    protected $weight;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("pickupLocationId")
     */
    protected $pickupLocationId;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ftd")
     */
    protected $ftd;

    /**
     * @return string
     */
    public function getPickupLocationId(): ?string
    {
        return $this->pickupLocationId;
    }

    /**
     * @param string $pickupLocationId
     *
     * @return $this
     */
    public function setPickupLocationId(?string $pickupLocationId)
    {
        $this->pickupLocationId = $pickupLocationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight(): ?string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     *
     * @return $this
     */
    public function setWeight(?string $weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFtd(): ?bool
    {
        return $this->ftd;
    }

    /**
     * @param bool $ftd
     *
     * @return $this
     */
    public function setFtd(?bool $ftd)
    {
        $this->ftd = $ftd;
        return $this;
    }
}
