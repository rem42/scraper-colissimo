<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Field
 * @package Scraper\ScraperColissimo\Soap
 */
class Field
{
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("key")
	 */
	protected $key;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("value")
	 */
	protected $value;

	/**
	 * @return string
	 */
	public function getKey(): ?string
	{
		return $this->key;
	}

	/**
	 * @param string $key
	 *
	 * @return $this
	 */
	public function setKey(?string $key)
	{
		$this->key = $key;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getValue(): ?string
	{
		return $this->value;
	}

	/**
	 * @param string $value
	 *
	 * @return $this
	 */
	public function setValue(?string $value)
	{
		$this->value = $value;
		return $this;
	}
}
