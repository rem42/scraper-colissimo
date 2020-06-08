<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Letter
 */
class Letter
{
    /**
     * @var Service
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Service")
     * @Serializer\SerializedName("service")
     */
    protected $service;
    /**
     * @var Parcel
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Parcel")
     * @Serializer\SerializedName("parcel")
     */
    protected $parcel;
    /**
     * @var CustomsDeclarations
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\CustomsDeclarations")
     * @Serializer\SerializedName("customsDeclarations")
     */
    protected $customsDeclarations;
    /**
     * @var Sender
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Sender")
     * @Serializer\SerializedName("sender")
     */
    protected $sender;
    /**
     * @var Addressee
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Addressee")
     * @Serializer\SerializedName("addressee")
     */
    protected $addressee;

    /**
     * Letter constructor.
     */
    public function __construct()
    {
        $this->service   = new Service();
        $this->parcel    = new Parcel();
        $this->sender    = new Sender();
        $this->addressee = new Addressee();
    }

    public function addCustomsDeclarations()
    {
        $this->customsDeclarations = new CustomsDeclarations();
        return $this;
    }

    /**
     * @return Addressee
     */
    public function getAddressee(): ?Addressee
    {
        return $this->addressee;
    }

    /**
     * @param Addressee $addressee
     *
     * @return $this
     */
    public function setAddressee(?Addressee $addressee)
    {
        $this->addressee = $addressee;
        return $this;
    }

    /**
     * @return CustomsDeclarations
     */
    public function getCustomsDeclarations(): ?CustomsDeclarations
    {
        return $this->customsDeclarations;
    }

    /**
     * @param CustomsDeclarations $customsDeclarations
     *
     * @return $this
     */
    public function setCustomsDeclarations(?CustomsDeclarations $customsDeclarations)
    {
        $this->customsDeclarations = $customsDeclarations;
        return $this;
    }

    /**
     * @return Parcel
     */
    public function getParcel(): ?Parcel
    {
        return $this->parcel;
    }

    /**
     * @param Parcel $parcel
     *
     * @return $this
     */
    public function setParcel(?Parcel $parcel)
    {
        $this->parcel = $parcel;
        return $this;
    }

    /**
     * @return Sender
     */
    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     *
     * @return $this
     */
    public function setSender(?Sender $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return Service
     */
    public function getService(): ?Service
    {
        return $this->service;
    }

    /**
     * @param Service $service
     *
     * @return $this
     */
    public function setService(?Service $service)
    {
        $this->service = $service;
        return $this;
    }
}
