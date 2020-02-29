<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Addressee
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("addresseeParcelRef")
     */
    protected string $addresseeParcelRef;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("codeBarForReference")
     */
    protected bool $codeBarForReference = false;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("serviceInfo")
     */
    protected string $serviceInfo;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Address")
     * @Serializer\SerializedName("address")
     */
    protected Address $address;

    public function __construct()
    {
        $this->address = new Address();
    }

    public function getAddresseeParcelRef(): ?string
    {
        return $this->addresseeParcelRef;
    }

    public function setAddresseeParcelRef(string $addresseeParcelRef): self
    {
        $this->addresseeParcelRef = $addresseeParcelRef;

        return $this;
    }

    public function isCodeBarForReference(): ?bool
    {
        return $this->codeBarForReference;
    }

    public function setCodeBarForReference(bool $codeBarForReference): self
    {
        $this->codeBarForReference = $codeBarForReference;

        return $this;
    }

    public function getServiceInfo(): ?string
    {
        return $this->serviceInfo;
    }

    public function setServiceInfo(string $serviceInfo): self
    {
        $this->serviceInfo = $serviceInfo;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}
