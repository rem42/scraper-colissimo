<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class GenerateLabelRequest
 */
class GenerateLabelRequest
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("contractNumber")
     */
    protected string $contractNumber;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("password")
     */
    protected string $password;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\OutputFormat")
     * @Serializer\SerializedName("outputFormat")
     */
    protected OutputFormat $outputFormat;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Letter")
     * @Serializer\SerializedName("letter")
     */
    protected Letter $letter;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Fields")
     * @Serializer\SerializedName("fields")
     */
    protected Fields $fields;

    /**
     * GenerateLabelRequest constructor.
     */
    public function __construct()
    {
        $this->outputFormat = new OutputFormat();
        $this->letter       = new Letter();
    }

    public function getContractNumber(): ?string
    {
        return $this->contractNumber;
    }

    public function setContractNumber(string $contractNumber): self
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getOutputFormat(): ?OutputFormat
    {
        return $this->outputFormat;
    }

    public function setOutputFormat(OutputFormat $outputFormat): self
    {
        $this->outputFormat = $outputFormat;

        return $this;
    }

    public function getLetter(): ?Letter
    {
        return $this->letter;
    }

    public function setLetter(Letter $letter): self
    {
        $this->letter = $letter;

        return $this;
    }

    public function getFields(): ?Fields
    {
        return $this->fields;
    }

    public function setFields(Fields $fields): self
    {
        $this->fields = $fields;

        return $this;
    }
}
