<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Body
 * @package Scraper\ScraperColissimo\Soap
 *
 * @Serializer\XmlNamespace(uri="http://sls.ws.coliposte.fr", prefix="ns2")
 */
class Body
{
	/**
	 * @var GenerateLabelResponse
	 * @Serializer\Type("Scraper\ScraperColissimo\Entity\GenerateLabelResponse")
	 * @Serializer\XmlElement(namespace="http://sls.ws.coliposte.fr")
	 * @Serializer\SerializedName("generateLabelResponse")
	 */
	protected $generateLabelResponse;

	/**
	 * @return GenerateLabelResponse
	 */
	public function getGenerateLabelResponse()
	{
		return $this->generateLabelResponse;
	}
}
