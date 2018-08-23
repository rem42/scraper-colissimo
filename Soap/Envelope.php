<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Envelope
 * @package Scraper\ScraperColissimo\Soap
 *
 * @Serializer\XmlNamespace(uri="http://schemas.xmlsoap.org/soap/envelope/", prefix="soapenv")
 * @Serializer\XmlRoot("soapenv:Envelope")
 */
class Envelope
{
	/**
	 * @var Header
	 * @Serializer\Type("Scraper\ScraperColissimo\Soap\Header")
	 * @Serializer\XmlElement(namespace="http://schemas.xmlsoap.org/soap/envelope/")
	 * @Serializer\SerializedName("Header")
	 */
	protected $header;
	/**
	 * @var Body
	 * @Serializer\Type("Scraper\ScraperColissimo\Soap\Body")
	 * @Serializer\XmlElement(namespace="http://schemas.xmlsoap.org/soap/envelope/")
	 * @Serializer\SerializedName("Body")
	 */
	protected $body;

	/**
	 * Envelope constructor.
	 */
	public function __construct()
	{
		$this->header = new Header();
		$this->body   = new Body();
	}

	/**
	 * @return Body
	 */
	public function getBody(): ?Body
	{
		return $this->body;
	}

	/**
	 * @param Body $body
	 *
	 * @return $this
	 */
	public function setBody(?Body $body)
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * @return Header
	 */
	public function getHeader(): ?Header
	{
		return $this->header;
	}

	/**
	 * @param Header $header
	 *
	 * @return $this
	 */
	public function setHeader(?Header $header)
	{
		$this->header = $header;
		return $this;
	}
}
