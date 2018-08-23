<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Article
 * @package Scraper\ScraperColissimo\Soap
 */
class Article
{
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("description")
	 */
	protected $description;
	/**
	 * @var integer
	 * @Serializer\Type("integer")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("quantity")
	 */
	protected $quantity;
	/**
	 * @var integer
	 * @Serializer\Type("integer")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("weight")
	 */
	protected $weight;
	/**
	 * @var integer
	 * @Serializer\Type("integer")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("value")
	 */
	protected $value;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("hsCode")
	 */
	protected $hsCode;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("originCountry")
	 */
	protected $originCountry;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("currency")
	 */
	protected $currency;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("artref")
	 */
	protected $artref;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("originalIdent")
	 */
	protected $originalIdent;

	/**
	 * @return string
	 */
	public function getArtref(): ?string
	{
		return $this->artref;
	}

	/**
	 * @param string $artref
	 *
	 * @return $this
	 */
	public function setArtref(?string $artref)
	{
		$this->artref = $artref;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCurrency(): ?string
	{
		return $this->currency;
	}

	/**
	 * @param string $currency
	 *
	 * @return $this
	 */
	public function setCurrency(?string $currency)
	{
		$this->currency = $currency;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 *
	 * @return $this
	 */
	public function setDescription(?string $description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHsCode(): ?string
	{
		return $this->hsCode;
	}

	/**
	 * @param string $hsCode
	 *
	 * @return $this
	 */
	public function setHsCode(?string $hsCode)
	{
		$this->hsCode = $hsCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOriginCountry(): ?string
	{
		return $this->originCountry;
	}

	/**
	 * @param string $originCountry
	 *
	 * @return $this
	 */
	public function setOriginCountry(?string $originCountry)
	{
		$this->originCountry = $originCountry;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOriginalIdent(): ?string
	{
		return $this->originalIdent;
	}

	/**
	 * @param string $originalIdent
	 *
	 * @return $this
	 */
	public function setOriginalIdent(?string $originalIdent)
	{
		$this->originalIdent = $originalIdent;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getQuantity(): ?int
	{
		return $this->quantity;
	}

	/**
	 * @param int $quantity
	 *
	 * @return $this
	 */
	public function setQuantity(?int $quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getValue(): ?int
	{
		return $this->value;
	}

	/**
	 * @param int $value
	 *
	 * @return $this
	 */
	public function setValue(?int $value)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getWeight(): ?int
	{
		return $this->weight;
	}

	/**
	 * @param int $weight
	 *
	 * @return $this
	 */
	public function setWeight(?int $weight)
	{
		$this->weight = $weight;
		return $this;
	}
}
