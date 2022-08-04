<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class CustomsDeclarations
{
    private bool $includeCustomsDeclarations;

    private Contents $contents;

    private string $importersReference;

    private string $flowTransport;

    private string $importersContact;

    private string $officeOrigin;

    private string $comments;

    private string $invoiceNumber;

    private string $licenceNumber;

    private string $certificatNumber;

    public function __construct()
    {
        $this->contents = new Contents();
    }

    public function isIncludeCustomsDeclarations(): ?bool
    {
        return $this->includeCustomsDeclarations;
    }

    public function setIncludeCustomsDeclarations(bool $includeCustomsDeclarations): self
    {
        $this->includeCustomsDeclarations = $includeCustomsDeclarations;

        return $this;
    }

    public function getContents(): Contents
    {
        return $this->contents;
    }

    public function setContents(Contents $contents): self
    {
        $this->contents = $contents;

        return $this;
    }

    public function getImportersReference(): ?string
    {
        return $this->importersReference;
    }

    public function setImportersReference(string $importersReference): self
    {
        $this->importersReference = $importersReference;

        return $this;
    }

    public function getFlowTransport(): ?string
    {
        return $this->flowTransport;
    }

    public function setFlowTransport(string $flowTransport): self
    {
        $this->flowTransport = $flowTransport;

        return $this;
    }

    public function getImportersContact(): ?string
    {
        return $this->importersContact;
    }

    public function setImportersContact(string $importersContact): self
    {
        $this->importersContact = $importersContact;

        return $this;
    }

    public function getOfficeOrigin(): ?string
    {
        return $this->officeOrigin;
    }

    public function setOfficeOrigin(string $officeOrigin): self
    {
        $this->officeOrigin = $officeOrigin;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getLicenceNumber(): ?string
    {
        return $this->licenceNumber;
    }

    public function setLicenceNumber(string $licenceNumber): self
    {
        $this->licenceNumber = $licenceNumber;

        return $this;
    }

    public function getCertificatNumber(): ?string
    {
        return $this->certificatNumber;
    }

    public function setCertificatNumber(string $certificatNumber): self
    {
        $this->certificatNumber = $certificatNumber;

        return $this;
    }
}
