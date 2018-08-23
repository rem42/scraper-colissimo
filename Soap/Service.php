<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Service
 * @package Scraper\ScraperColissimo\Soap
 */
class Service
{
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $A2P = "A2P";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $BPR = "BPR";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $ACP = "ACP";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $CDI = "CDI";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $CMT = "CMT";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $BDP = "BDP";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $PCS = "PCS";

	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $DOM = "DOM";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $DOS = "DOS";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $BOS = "BOS";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $BOM = "BOM";

	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $RECOMMENDATIONLEVEL_R1 = "R1";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $RECOMMENDATIONLEVEL_R2 = "R2";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $RECOMMENDATIONLEVEL_R3 = "R3";

	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("productCode")
	 */
	protected $productCode;
	/**
	 * @var \DateTime
	 * @Serializer\Type("DateTime<'Y-m-d'>")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("depositDate")
	 */
	protected $depositDate;
	/**
	 * @var boolean
	 * @Serializer\Type("boolean")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("mailBoxPicking")
	 */
	protected $mailBoxPicking;
	/**
	 * @var \DateTime
	 * @Serializer\Type("DateTime<'Y-m-d'>")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("mailBoxPickingDate")
	 */
	protected $mailBoxPickingDate;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("transportationAmount")
	 */
	protected $transportationAmount;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("totalAmount")
	 */
	protected $totalAmount;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("orderNumber")
	 */
	protected $orderNumber;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("commercialName")
	 */
	protected $commercialName;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("returnTypeChoice")
	 */
	protected $returnTypeChoice;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("insuranceValue")
	 */
	protected $insuranceValue;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("insuranceValue")
	 */
	protected $recommendationLevel;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("weight")
	 */
	protected $weight;
	/**
	 * @var boolean
	 * @Serializer\Type("boolean")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("nonMachinable")
	 */
	protected $nonMachinable;
	/**
	 * @var boolean
	 * @Serializer\Type("boolean")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("COD")
	 */
	protected $COD;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("CODAmount")
	 */
	protected $CODAmount;
	/**
	 * @var boolean
	 * @Serializer\Type("boolean")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("returnReceipt")
	 */
	protected $returnReceipt;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("instructions")
	 */
	protected $instructions;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("pickupLocationId")
	 */
	protected $pickupLocationId;
	/**
	 * @var boolean
	 * @Serializer\Type("boolean")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("ftd")
	 */
	protected $ftd;

	/**
	 * @return string
	 */
	public function getCODAmount(): ?string
	{
		return $this->CODAmount;
	}

	/**
	 * @param string $CODAmount
	 *
	 * @return $this
	 */
	public function setCODAmount(?string $CODAmount)
	{
		$this->CODAmount = $CODAmount;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCommercialName(): ?string
	{
		return $this->commercialName;
	}

	/**
	 * @param string $commercialName
	 *
	 * @return $this
	 */
	public function setCommercialName(?string $commercialName)
	{
		$this->commercialName = $commercialName;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDepositDate(): ?\DateTime
	{
		return $this->depositDate;
	}

	/**
	 * @param \DateTime $depositDate
	 *
	 * @return $this
	 */
	public function setDepositDate(?\DateTime $depositDate)
	{
		$this->depositDate = $depositDate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getInstructions(): ?string
	{
		return $this->instructions;
	}

	/**
	 * @param string $instructions
	 *
	 * @return $this
	 */
	public function setInstructions(?string $instructions)
	{
		$this->instructions = $instructions;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getInsuranceValue(): ?string
	{
		return $this->insuranceValue;
	}

	/**
	 * @param string $insuranceValue
	 *
	 * @return $this
	 */
	public function setInsuranceValue(?string $insuranceValue)
	{
		$this->insuranceValue = $insuranceValue;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getMailBoxPickingDate(): ?\DateTime
	{
		return $this->mailBoxPickingDate;
	}

	/**
	 * @param \DateTime $mailBoxPickingDate
	 *
	 * @return $this
	 */
	public function setMailBoxPickingDate(?\DateTime $mailBoxPickingDate)
	{
		$this->mailBoxPickingDate = $mailBoxPickingDate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOrderNumber(): ?string
	{
		return $this->orderNumber;
	}

	/**
	 * @param string $orderNumber
	 *
	 * @return $this
	 */
	public function setOrderNumber(?string $orderNumber)
	{
		$this->orderNumber = $orderNumber;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPickupLocationId(): ?string
	{
		return $this->pickupLocationId;
	}

	/**
	 * @param string $pickupLocationId
	 *
	 * @return $this
	 */
	public function setPickupLocationId(?string $pickupLocationId)
	{
		$this->pickupLocationId = $pickupLocationId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getProductCode(): ?string
	{
		return $this->productCode;
	}

	/**
	 * @param string $productCode
	 *
	 * @return $this
	 */
	public function setProductCode(?string $productCode)
	{
		$this->productCode = $productCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRecommendationLevel(): ?string
	{
		return $this->recommendationLevel;
	}

	/**
	 * @param string $recommendationLevel
	 *
	 * @return $this
	 */
	public function setRecommendationLevel(?string $recommendationLevel)
	{
		$this->recommendationLevel = $recommendationLevel;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getReturnTypeChoice(): ?string
	{
		return $this->returnTypeChoice;
	}

	/**
	 * @param string $returnTypeChoice
	 *
	 * @return $this
	 */
	public function setReturnTypeChoice(?string $returnTypeChoice)
	{
		$this->returnTypeChoice = $returnTypeChoice;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTotalAmount(): ?string
	{
		return $this->totalAmount;
	}

	/**
	 * @param string $totalAmount
	 *
	 * @return $this
	 */
	public function setTotalAmount(?string $totalAmount)
	{
		$this->totalAmount = $totalAmount;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTransportationAmount(): ?string
	{
		return $this->transportationAmount;
	}

	/**
	 * @param string $transportationAmount
	 *
	 * @return $this
	 */
	public function setTransportationAmount(?string $transportationAmount)
	{
		$this->transportationAmount = $transportationAmount;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getWeight(): ?string
	{
		return $this->weight;
	}

	/**
	 * @param string $weight
	 *
	 * @return $this
	 */
	public function setWeight(?string $weight)
	{
		$this->weight = $weight;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isCOD(): ?bool
	{
		return $this->COD;
	}

	/**
	 * @param bool $COD
	 *
	 * @return $this
	 */
	public function setCOD(?bool $COD)
	{
		$this->COD = $COD;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isFtd(): ?bool
	{
		return $this->ftd;
	}

	/**
	 * @param bool $ftd
	 *
	 * @return $this
	 */
	public function setFtd(?bool $ftd)
	{
		$this->ftd = $ftd;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isMailBoxPicking(): ?bool
	{
		return $this->mailBoxPicking;
	}

	/**
	 * @param bool $mailBoxPicking
	 *
	 * @return $this
	 */
	public function setMailBoxPicking(?bool $mailBoxPicking)
	{
		$this->mailBoxPicking = $mailBoxPicking;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isNonMachinable(): ?bool
	{
		return $this->nonMachinable;
	}

	/**
	 * @param bool $nonMachinable
	 *
	 * @return $this
	 */
	public function setNonMachinable(?bool $nonMachinable)
	{
		$this->nonMachinable = $nonMachinable;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isReturnReceipt(): ?bool
	{
		return $this->returnReceipt;
	}

	/**
	 * @param bool $returnReceipt
	 *
	 * @return $this
	 */
	public function setReturnReceipt(?bool $returnReceipt)
	{
		$this->returnReceipt = $returnReceipt;
		return $this;
	}
}
