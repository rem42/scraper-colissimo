<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Address
 */
class Address
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("companyName")
     */
    protected $companyName;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("lastName")
     */
    protected $lastName;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("firstName")
     */
    protected $firstName;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("line0")
     */
    protected $line0;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("line1")
     */
    protected $line1;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("line2")
     */
    protected $line2;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("line3")
     */
    protected $line3;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("countryCode")
     */
    protected $countryCode;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("city")
     */
    protected $city;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("zipCode")
     */
    protected $zipCode;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("phoneNumber")
     */
    protected $phoneNumber;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("mobileNumber")
     */
    protected $mobileNumber;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("doorCode1")
     */
    protected $doorCode1;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("doorCode2")
     */
    protected $doorCode2;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("email")
     */
    protected $email;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("intercom")
     */
    protected $intercom;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("language")
     */
    protected $language;

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity(?string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     *
     * @return $this
     */
    public function setCompanyName(?string $companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return $this
     */
    public function setCountryCode(?string $countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoorCode1(): ?string
    {
        return $this->doorCode1;
    }

    /**
     * @param string $doorCode1
     *
     * @return $this
     */
    public function setDoorCode1(?string $doorCode1)
    {
        $this->doorCode1 = $doorCode1;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoorCode2(): ?string
    {
        return $this->doorCode2;
    }

    /**
     * @param string $doorCode2
     *
     * @return $this
     */
    public function setDoorCode2(?string $doorCode2)
    {
        $this->doorCode2 = $doorCode2;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntercom(): ?string
    {
        return $this->intercom;
    }

    /**
     * @param string $intercom
     *
     * @return $this
     */
    public function setIntercom(?string $intercom)
    {
        $this->intercom = $intercom;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage(?string $language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine0(): ?string
    {
        return $this->line0;
    }

    /**
     * @param string $line0
     *
     * @return $this
     */
    public function setLine0(?string $line0)
    {
        $this->line0 = $line0;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     *
     * @return $this
     */
    public function setLine1(?string $line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * @param string $line2
     *
     * @return $this
     */
    public function setLine2(?string $line2)
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine3(): ?string
    {
        return $this->line3;
    }

    /**
     * @param string $line3
     *
     * @return $this
     */
    public function setLine3(?string $line3)
    {
        $this->line3 = $line3;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     *
     * @return $this
     */
    public function setMobileNumber(?string $mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber(?string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return $this
     */
    public function setZipCode(?string $zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }
}
