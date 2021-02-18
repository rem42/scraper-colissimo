<?php

namespace Scraper\ScraperColissimo\Entity;

final class LabelResponse
{
    private string $parcelNumber;

    private string $parcelNumberPartner;

    private ?string $pdfUrl;

    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    public function setParcelNumber(string $parcelNumber): self
    {
        $this->parcelNumber = $parcelNumber;

        return $this;
    }

    public function getParcelNumberPartner(): string
    {
        return $this->parcelNumberPartner;
    }

    public function setParcelNumberPartner(string $parcelNumberPartner): self
    {
        $this->parcelNumberPartner = $parcelNumberPartner;

        return $this;
    }

    public function getPdfUrl(): ?string
    {
        return $this->pdfUrl;
    }

    public function setPdfUrl(?string $pdfUrl = null): self
    {
        $this->pdfUrl = $pdfUrl;

        return $this;
    }
}
