<?php

namespace Scraper\ScraperColissimo\Soap;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GenerateLabel
 * @package Scraper\ScraperColissimo\Soap
 *
 */
class GenerateLabel
{
	/**
	 * @var GenerateLabelRequest
	 * @Serializer\Type("Scraper\ScraperColissimo\Soap\GenerateLabelRequest")
	 * @Serializer\SerializedName("generateLabelRequest")
	 */
	protected $generateLabelRequest;

	/**
	 * GenerateLabel constructor.
	 */
	public function __construct()
	{
		$this->generateLabelRequest = new GenerateLabelRequest();
	}

	/**
	 * @return GenerateLabelRequest
	 */
	public function getGenerateLabelRequest(): ?GenerateLabelRequest
	{
		return $this->generateLabelRequest;
	}

	/**
	 * @param GenerateLabelRequest $generateLabelRequest
	 *
	 * @return $this
	 */
	public function setGenerateLabelRequest(?GenerateLabelRequest $generateLabelRequest)
	{
		$this->generateLabelRequest = $generateLabelRequest;
		return $this;
	}
}
