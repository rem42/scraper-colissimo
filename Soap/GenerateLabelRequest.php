<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class GenerateLabelRequest
 */
class GenerateLabelRequest
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("contractNumber")
     */
    protected $contractNumber;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("password")
     */
    protected $password;
    /**
     * @var OutputFormat
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\OutputFormat")
     * @Serializer\SerializedName("outputFormat")
     */
    protected $outputFormat;
    /**
     * @var Letter
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Letter")
     * @Serializer\SerializedName("letter")
     */
    protected $letter;
    /**
     * @var Fields
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Fields")
     * @Serializer\SerializedName("fields")
     */
    protected $fields;

    /**
     * GenerateLabelRequest constructor.
     */
    public function __construct()
    {
        $this->outputFormat = new OutputFormat();
        $this->letter       = new Letter();
    }

    /**
     * @return string
     */
    public function getContractNumber(): ?string
    {
        return $this->contractNumber;
    }

    /**
     * @param string $contractNumber
     *
     * @return $this
     */
    public function setContractNumber(?string $contractNumber)
    {
        $this->contractNumber = $contractNumber;
        return $this;
    }

    /**
     * @return Fields
     */
    public function getFields(): ?Fields
    {
        return $this->fields;
    }

    /**
     * @param Fields $fields
     *
     * @return $this
     */
    public function setFields(?Fields $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return Letter
     */
    public function getLetter(): ?Letter
    {
        return $this->letter;
    }

    /**
     * @param Letter $letter
     *
     * @return $this
     */
    public function setLetter(?Letter $letter)
    {
        $this->letter = $letter;
        return $this;
    }

    /**
     * @return OutputFormat
     */
    public function getOutputFormat(): ?OutputFormat
    {
        return $this->outputFormat;
    }

    /**
     * @param OutputFormat $outputFormat
     *
     * @return $this
     */
    public function setOutputFormat(?OutputFormat $outputFormat)
    {
        $this->outputFormat = $outputFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(?string $password)
    {
        $this->password = $password;
        return $this;
    }
}
