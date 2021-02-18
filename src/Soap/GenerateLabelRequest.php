<?php

namespace Scraper\ScraperColissimo\Soap;

final class GenerateLabelRequest
{
    private string $contractNumber;

    private string $password;

    private OutputFormat $outputFormat;

    private Letter $letter;

    private ?Fields $fields = null;

    public function __construct()
    {
        $this->outputFormat = new OutputFormat();
        $this->letter       = new Letter();
    }

    public function getOutputFormat(): OutputFormat
    {
        return $this->outputFormat;
    }

    public function getLetter(): Letter
    {
        return $this->letter;
    }

    public function getFields(): ?Fields
    {
        return $this->fields;
    }

    public function getContractNumber(): string
    {
        return $this->contractNumber;
    }

    public function setContractNumber(string $contractNumber): self
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
