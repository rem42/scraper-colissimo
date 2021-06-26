<?php

namespace Scraper\ScraperColissimo\Rest;

final class Parcel
{
    private int $insuranceValue = 0;

    private float $weight;

    private bool $nonMachinable = false;

    private bool $COD = false;

    private float $CODAmount = 0;

    private bool $returnReceipt = false;

    private ?string $instructions = '';

    private ?string $pickupLocationId = null;

    private bool $ftd = false;

    private bool $ddp = false;

    public function getInsuranceValue(): int
    {
        return $this->insuranceValue;
    }

    public function setInsuranceValue(int $insuranceValue): self
    {
        $this->insuranceValue = $insuranceValue;

        return $this;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function isNonMachinable(): bool
    {
        return $this->nonMachinable;
    }

    public function setNonMachinable(bool $nonMachinable): self
    {
        $this->nonMachinable = $nonMachinable;

        return $this;
    }

    public function isCOD(): bool
    {
        return $this->COD;
    }

    public function setCOD(bool $COD): self
    {
        $this->COD = $COD;

        return $this;
    }

    public function getCODAmount(): float
    {
        return $this->CODAmount;
    }

    public function setCODAmount(float $CODAmount = 0): self
    {
        $this->CODAmount = $CODAmount;

        return $this;
    }

    public function isReturnReceipt(): bool
    {
        return $this->returnReceipt;
    }

    public function setReturnReceipt(bool $returnReceipt): self
    {
        $this->returnReceipt = $returnReceipt;

        return $this;
    }

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions = null): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    public function getPickupLocationId(): ?string
    {
        return $this->pickupLocationId;
    }

    public function setPickupLocationId(?string $pickupLocationId = null): self
    {
        $this->pickupLocationId = $pickupLocationId;

        return $this;
    }

    public function isFtd(): bool
    {
        return $this->ftd;
    }

    public function setFtd(bool $ftd): self
    {
        $this->ftd = $ftd;

        return $this;
    }

    public function isDdp(): bool
    {
        return $this->ddp;
    }

    public function setDdp(bool $ddp): self
    {
        $this->ddp = $ddp;

        return $this;
    }
}
