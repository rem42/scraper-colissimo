<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Sender
{
    private ?string $senderParcelRef = null;

    private Address $address;

    public function __construct()
    {
        $this->address = new Address();
    }

    public function setSenderParcelRef(?string $senderParcelRef = null): self
    {
        $this->senderParcelRef = $senderParcelRef;

        return $this;
    }

    public function getSenderParcelRef(): ?string
    {
        return $this->senderParcelRef;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
