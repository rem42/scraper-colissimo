<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Article
{
    private string $description;

    private int $quantity;

    private float $weight;

    private int $value;

    private ?string $hsCode = null;

    private ?string $originCountry = null;

    private ?string $currency = null;

    private ?string $artref = null;

    private ?string $originalIdent = null;

    private ?int $vatAmount = null;

    private ?int $customsFees = null;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getHsCode(): ?string
    {
        return $this->hsCode;
    }

    public function setHsCode(string $hsCode = null): self
    {
        $this->hsCode = $hsCode;

        return $this;
    }

    public function getOriginCountry(): ?string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(string $originCountry = null): self
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency = null): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getArtref(): ?string
    {
        return $this->artref;
    }

    public function setArtref(string $artref = null): self
    {
        $this->artref = $artref;

        return $this;
    }

    public function getOriginalIdent(): ?string
    {
        return $this->originalIdent;
    }

    public function setOriginalIdent(string $originalIdent = null): self
    {
        $this->originalIdent = $originalIdent;

        return $this;
    }

    public function getVatAmount(): ?int
    {
        return $this->vatAmount;
    }

    public function setVatAmount(int $vatAmount = null): self
    {
        $this->vatAmount = $vatAmount;

        return $this;
    }

    public function getCustomsFees(): ?int
    {
        return $this->customsFees;
    }

    public function setCustomsFees(int $customsFees = null): self
    {
        $this->customsFees = $customsFees;

        return $this;
    }
}
