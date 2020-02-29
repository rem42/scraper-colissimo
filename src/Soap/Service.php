<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Service
{
    /** @Serializer\Exclude() */
    public static string $A2P = 'A2P';
    /** @Serializer\Exclude() */
    public static string $BPR = 'BPR';
    /** @Serializer\Exclude() */
    public static string $ACP = 'ACP';
    /** @Serializer\Exclude() */
    public static string $CDI = 'CDI';
    /** @Serializer\Exclude() */
    public static string $CMT = 'CMT';
    /** @Serializer\Exclude() */
    public static string $BDP = 'BDP';
    /** @Serializer\Exclude() */
    public static string $PCS = 'PCS';

    /** @Serializer\Exclude() */
    public static string $DOM = 'DOM';
    /** @Serializer\Exclude() */
    public static string $DOS = 'DOS';
    /** @Serializer\Exclude() */
    public static string $BOS = 'BOS';
    /** @Serializer\Exclude() */
    public static string $BOM = 'BOM';

    /** @Serializer\Exclude() */
    public static string $RECOMMENDATIONLEVEL_R1 = 'R1';
    /** @Serializer\Exclude() */
    public static string $RECOMMENDATIONLEVEL_R2 = 'R2';
    /** @Serializer\Exclude() */
    public static string $RECOMMENDATIONLEVEL_R3 = 'R3';

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("productCode")
     */
    protected string $productCode;
    /**
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("depositDate")
     */
    protected \DateTime $depositDate;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("mailBoxPicking")
     */
    protected bool $mailBoxPicking;
    /**
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("mailBoxPickingDate")
     */
    protected \DateTime $mailBoxPickingDate;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("transportationAmount")
     */
    protected string $transportationAmount;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("totalAmount")
     */
    protected string $totalAmount;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("orderNumber")
     */
    protected string $orderNumber;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("commercialName")
     */
    protected string $commercialName;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("returnTypeChoice")
     */
    protected string $returnTypeChoice;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("insuranceValue")
     */
    protected string $insuranceValue;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("insuranceValue")
     */
    protected string $recommendationLevel;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("weight")
     */
    protected string $weight;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("nonMachinable")
     */
    protected bool $nonMachinable;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("COD")
     */
    protected bool $COD;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CODAmount")
     */
    protected string $CODAmount;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("returnReceipt")
     */
    protected bool $returnReceipt;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("instructions")
     */
    protected string $instructions;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("pickupLocationId")
     */
    protected string $pickupLocationId;
    /**
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ftd")
     */
    protected bool $ftd;

    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): self
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getDepositDate(): ?\DateTime
    {
        return $this->depositDate;
    }

    public function setDepositDate(\DateTime $depositDate): self
    {
        $this->depositDate = $depositDate;

        return $this;
    }

    public function isMailBoxPicking(): ?bool
    {
        return $this->mailBoxPicking;
    }

    public function setMailBoxPicking(bool $mailBoxPicking): self
    {
        $this->mailBoxPicking = $mailBoxPicking;

        return $this;
    }

    public function getMailBoxPickingDate(): ?\DateTime
    {
        return $this->mailBoxPickingDate;
    }

    public function setMailBoxPickingDate(\DateTime $mailBoxPickingDate): self
    {
        $this->mailBoxPickingDate = $mailBoxPickingDate;

        return $this;
    }

    public function getTransportationAmount(): ?string
    {
        return $this->transportationAmount;
    }

    public function setTransportationAmount(string $transportationAmount): self
    {
        $this->transportationAmount = $transportationAmount;

        return $this;
    }

    public function getTotalAmount(): ?string
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(string $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getCommercialName(): ?string
    {
        return $this->commercialName;
    }

    public function setCommercialName(string $commercialName): self
    {
        $this->commercialName = $commercialName;

        return $this;
    }

    public function getReturnTypeChoice(): ?string
    {
        return $this->returnTypeChoice;
    }

    public function setReturnTypeChoice(string $returnTypeChoice): self
    {
        $this->returnTypeChoice = $returnTypeChoice;

        return $this;
    }

    public function getInsuranceValue(): ?string
    {
        return $this->insuranceValue;
    }

    public function setInsuranceValue(string $insuranceValue): self
    {
        $this->insuranceValue = $insuranceValue;

        return $this;
    }

    public function getRecommendationLevel(): ?string
    {
        return $this->recommendationLevel;
    }

    public function setRecommendationLevel(string $recommendationLevel): self
    {
        $this->recommendationLevel = $recommendationLevel;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function isNonMachinable(): ?bool
    {
        return $this->nonMachinable;
    }

    public function setNonMachinable(bool $nonMachinable): self
    {
        $this->nonMachinable = $nonMachinable;

        return $this;
    }

    public function isCOD(): ?bool
    {
        return $this->COD;
    }

    public function setCOD(bool $COD): self
    {
        $this->COD = $COD;

        return $this;
    }

    public function getCODAmount(): ?string
    {
        return $this->CODAmount;
    }

    public function setCODAmount(string $CODAmount): self
    {
        $this->CODAmount = $CODAmount;

        return $this;
    }

    public function isReturnReceipt(): ?bool
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

    public function setInstructions(string $instructions): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    public function getPickupLocationId(): ?string
    {
        return $this->pickupLocationId;
    }

    public function setPickupLocationId(string $pickupLocationId): self
    {
        $this->pickupLocationId = $pickupLocationId;

        return $this;
    }

    public function isFtd(): ?bool
    {
        return $this->ftd;
    }

    public function setFtd(bool $ftd): self
    {
        $this->ftd = $ftd;

        return $this;
    }
}
