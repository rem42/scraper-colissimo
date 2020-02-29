<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Letter
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Service")
     * @Serializer\SerializedName("service")
     */
    protected Service $service;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Parcel")
     * @Serializer\SerializedName("parcel")
     */
    protected Parcel $parcel;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\CustomsDeclarations")
     * @Serializer\SerializedName("customsDeclarations")
     */
    protected CustomsDeclarations $customsDeclarations;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Sender")
     * @Serializer\SerializedName("sender")
     */
    protected Sender $sender;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Addressee")
     * @Serializer\SerializedName("addressee")
     */
    protected Addressee $addressee;

    public function __construct()
    {
        $this->service   = new Service();
        $this->parcel    = new Parcel();
        $this->sender    = new Sender();
        $this->addressee = new Addressee();
    }

    public function addCustomsDeclarations(): self
    {
        $this->customsDeclarations = new CustomsDeclarations();
        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function getParcel(): ?Parcel
    {
        return $this->parcel;
    }

    public function getCustomsDeclarations(): ?CustomsDeclarations
    {
        return $this->customsDeclarations;
    }

    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    public function getAddressee(): ?Addressee
    {
        return $this->addressee;
    }
}
