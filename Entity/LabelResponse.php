<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class LabelResponse
 * @package Scraper\ScraperColissimo\Entity
 */
class LabelResponse
{
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("parcelNumber")
	 */
	protected $parcelNumber;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("parcelNumberPartner")
	 */
	protected $parcelNumberPartner;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("pdfUrl")
	 */
	protected $pdfUrl;

	/**
	 * @return string
	 */
	public function getParcelNumber()
	{
		return $this->parcelNumber;
	}

	/**
	 * @return string
	 */
	public function getParcelNumberPartner()
	{
		return $this->parcelNumberPartner;
	}

	/**
	 * @return string
	 */
	public function getPdfUrl()
	{
		return $this->pdfUrl;
	}
}
