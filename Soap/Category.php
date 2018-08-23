<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Category
 * @package Scraper\ScraperColissimo\Soap
 */
class Category
{
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $GIFT = "1";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $COMMERCIAL_SAMPLE = "2";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $COMMERCIAL = "3";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $DOCUMENT = "4";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $OTHER = "5";
	/**
	 * @var string
	 * @Serializer\Exclude()
	 */
	public static $MERCHANDISE_RETURN = "6";
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
