<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class CustomsDeclarations
 */
class CustomsDeclarations
{
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("includeCustomsDeclarations")
     */
    protected $includeCustomsDeclarations;
    /**
     * @var Contents
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Contents")
     * @Serializer\SerializedName("contents")
     */
    protected $contents;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("importersReference")
     */
    protected $importersReference;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("flowTransport")
     */
    protected $flowTransport;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("importersContact")
     */
    protected $importersContact;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("officeOrigin")
     */
    protected $officeOrigin;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comments")
     */
    protected $comments;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("invoiceNumber")
     */
    protected $invoiceNumber;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("licenceNumber")
     */
    protected $licenceNumber;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("certificatNumber")
     */
    protected $certificatNumber;

    /**
     * CustomsDeclarations constructor.
     */
    public function __construct()
    {
        $this->contents = new Contents();
    }

    /**
     * @return string
     */
    public function getCertificatNumber(): ?string
    {
        return $this->certificatNumber;
    }

    /**
     * @param string $certificatNumber
     *
     * @return $this
     */
    public function setCertificatNumber(?string $certificatNumber)
    {
        $this->certificatNumber = $certificatNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments(): ?string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     *
     * @return $this
     */
    public function setComments(?string $comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return Contents
     */
    public function getContents(): ?Contents
    {
        return $this->contents;
    }

    /**
     * @param Contents $contents
     *
     * @return $this
     */
    public function setContents(?Contents $contents)
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlowTransport(): ?string
    {
        return $this->flowTransport;
    }

    /**
     * @param string $flowTransport
     *
     * @return $this
     */
    public function setFlowTransport(?string $flowTransport)
    {
        $this->flowTransport = $flowTransport;
        return $this;
    }

    /**
     * @return string
     */
    public function getImportersContact(): ?string
    {
        return $this->importersContact;
    }

    /**
     * @param string $importersContact
     *
     * @return $this
     */
    public function setImportersContact(?string $importersContact)
    {
        $this->importersContact = $importersContact;
        return $this;
    }

    /**
     * @return string
     */
    public function getImportersReference(): ?string
    {
        return $this->importersReference;
    }

    /**
     * @param string $importersReference
     *
     * @return $this
     */
    public function setImportersReference(?string $importersReference)
    {
        $this->importersReference = $importersReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     *
     * @return $this
     */
    public function setInvoiceNumber(?string $invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getLicenceNumber(): ?string
    {
        return $this->licenceNumber;
    }

    /**
     * @param string $licenceNumber
     *
     * @return $this
     */
    public function setLicenceNumber(?string $licenceNumber)
    {
        $this->licenceNumber = $licenceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getOfficeOrigin(): ?string
    {
        return $this->officeOrigin;
    }

    /**
     * @param string $officeOrigin
     *
     * @return $this
     */
    public function setOfficeOrigin(?string $officeOrigin)
    {
        $this->officeOrigin = $officeOrigin;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIncludeCustomsDeclarations(): ?bool
    {
        return $this->includeCustomsDeclarations;
    }

    /**
     * @param bool $includeCustomsDeclarations
     *
     * @return $this
     */
    public function setIncludeCustomsDeclarations(?bool $includeCustomsDeclarations)
    {
        $this->includeCustomsDeclarations = $includeCustomsDeclarations;
        return $this;
    }
}
