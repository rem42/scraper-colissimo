<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Sender
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("senderParcelRef")
     */
    protected string $senderParcelRef;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Address")
     * @Serializer\SerializedName("address")
     */
    protected Address $address;

    /**
     * Sender constructor.
     */
    public function __construct()
    {
        $this->address = new Address();
    }

    public function getSenderParcelRef(): ?string
    {
        return $this->senderParcelRef;
    }

    public function setSenderParcelRef(string $senderParcelRef): self
    {
        $this->senderParcelRef = $senderParcelRef;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }
}
