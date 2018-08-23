<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Messages
 * @package Scraper\ScraperColissimo\Entity
 */
class Messages
{
	/**
	 * @var integer
	 * @Serializer\Type("integer")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("id")
	 */
	protected $id;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("messageContent")
	 */
	protected $messageContent;
	/**
	 * @var string
	 * @Serializer\Type("string")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SerializedName("type")
	 */
	protected $type;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getMessageContent()
	{
		return $this->messageContent;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
}
