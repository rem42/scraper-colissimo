<?php

namespace Scraper\ScraperColissimo\Soap;

final class Addressee
{
    private ?string $addresseeParcelRef = null;

    private bool $codeBarForReference = false;

    private ?string $serviceInfo = null;

    private Address $address;

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

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}
