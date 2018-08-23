<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

class Sender
{
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("senderParcelRef")
	 */
	protected $senderParcelRef;
	/**
	 * @var Address
	 * @Serializer\Type("Scraper\ScraperColissimo\Soap\Address")
	 * @Serializer\SerializedName("address")
	 */
	protected $address;

	/**
	 * Sender constructor.
	 */
	public function __construct()
	{
		$this->address = new Address();
	}

	/**
	 * @return string
	 */
	public function getSenderParcelRef(): ?string
	{
		return $this->senderParcelRef;
	}

	/**
	 * @param string $senderParcelRef
	 *
	 * @return $this
	 */
	public function setSenderParcelRef(?string $senderParcelRef)
	{
		$this->senderParcelRef = $senderParcelRef;
		return $this;
	}

	/**
	 * @return Address
	 */
	public function getAddress(): ?Address
	{
		return $this->address;
	}

	/**
	 * @param Address $address
	 *
	 * @return $this
	 */
	public function setAddress(?Address $address)
	{
		$this->address = $address;
		return $this;
	}
}
