<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Letter
{
    private Service $service;

    private Parcel $parcel;

    private ?CustomsDeclarations $customsDeclarations = null;

    private Sender $sender;

    private Addressee $addressee;

    public function __construct()
    {
        $this->service = new Service();
        $this->parcel = new Parcel();
        $this->sender = new Sender();
        $this->addressee = new Addressee();
    }

    public function getCustomsDeclarations(): ?CustomsDeclarations
    {
        return $this->customsDeclarations;
    }

    public function setCustomsDeclarations(?CustomsDeclarations $customsDeclarations = null): self
    {
        $this->customsDeclarations = $customsDeclarations;

        return $this;
    }

    public function getService(): Service
    {
        return $this->service;
    }

    public function getParcel(): Parcel
    {
        return $this->parcel;
    }

    public function getSender(): Sender
    {
        return $this->sender;
    }

    public function getAddressee(): Addressee
    {
        return $this->addressee;
    }
}
