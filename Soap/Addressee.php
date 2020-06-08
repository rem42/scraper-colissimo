<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Addressee
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("addresseeParcelRef")
     */
    protected $addresseeParcelRef;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("codeBarForReference")
     */
    protected $codeBarForReference = false;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("serviceInfo")
     */
    protected $serviceInfo;
    /**
     * @var Address
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Address")
     * @Serializer\SerializedName("address")
     */
    protected $address;

    /**
     * Sender constructor.
     */
    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * @return Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function setAddress(?Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddresseeParcelRef(): ?string
    {
        return $this->addresseeParcelRef;
    }

    /**
     * @param string $addresseeParcelRef
     *
     * @return $this
     */
    public function setAddresseeParcelRef(?string $addresseeParcelRef)
    {
        $this->addresseeParcelRef = $addresseeParcelRef;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceInfo(): ?string
    {
        return $this->serviceInfo;
    }

    /**
     * @param string $serviceInfo
     *
     * @return $this
     */
    public function setServiceInfo(?string $serviceInfo)
    {
        $this->serviceInfo = $serviceInfo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCodeBarForReference(): ?bool
    {
        return $this->codeBarForReference;
    }

    /**
     * @param bool $codeBarForReference
     *
     * @return $this
     */
    public function setCodeBarForReference(?bool $codeBarForReference)
    {
        $this->codeBarForReference = $codeBarForReference;
        return $this;
    }
}
