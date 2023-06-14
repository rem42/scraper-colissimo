<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Rest;

final class Address
{
    private ?string $companyName = null;

    private ?string $lastName = null;

    private ?string $firstName = null;

    private ?string $line0 = null;

    private ?string $line1 = null;

    private ?string $line2 = null;

    private ?string $line3 = null;

    private string $countryCode;

    private ?string $city = null;

    private string $zipCode;

    private ?string $phoneNumber = null;

    private ?string $mobileNumber = null;

    private ?string $doorCode1 = null;

    private ?string $doorCode2 = null;

    private ?string $email = null;

    private ?string $intercom = null;

    private string $language = 'FR';

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName = null): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName = null): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName = null): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLine0(): ?string
    {
        return $this->line0;
    }

    public function setLine0(string $line0 = null): self
    {
        $this->line0 = $line0;

        return $this;
    }

    public function getLine1(): ?string
    {
        return $this->line1;
    }

    public function setLine1(string $line1 = null): self
    {
        $this->line1 = $line1;

        return $this;
    }

    public function getLine2(): ?string
    {
        return $this->line2;
    }

    public function setLine2(string $line2 = null): self
    {
        $this->line2 = $line2;

        return $this;
    }

    public function getLine3(): ?string
    {
        return $this->line3;
    }

    public function setLine3(string $line3 = null): self
    {
        $this->line3 = $line3;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city = null): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber = null): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    public function setMobileNumber(string $mobileNumber = null): self
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    public function getDoorCode1(): ?string
    {
        return $this->doorCode1;
    }

    public function setDoorCode1(string $doorCode1 = null): self
    {
        $this->doorCode1 = $doorCode1;

        return $this;
    }

    public function getDoorCode2(): ?string
    {
        return $this->doorCode2;
    }

    public function setDoorCode2(string $doorCode2 = null): self
    {
        $this->doorCode2 = $doorCode2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email = null): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIntercom(): ?string
    {
        return $this->intercom;
    }

    public function setIntercom(string $intercom = null): self
    {
        $this->intercom = $intercom;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }
}
