<?php

namespace Scraper\ScraperColissimo\Request;

use JMS\Serializer\SerializerBuilder;
use Scraper\Scraper\Annotation\UrlAnnotation;
use Scraper\Scraper\Request\Request;
use Scraper\ScraperColissimo\Soap\Envelope;

/**
 * Class ColissimoRequest
 * @package Scraper\ScraperColissimo\Request
 *
 * @UrlAnnotation(baseUrl="https://ws.colissimo.fr", protocol="SOAP")
 */
abstract class ColissimoRequest extends Request
{
	/**
	 * @var Envelope
	 */
	protected $enveloppe;
	/**
	 * @var string
	 */
	protected $contractNumber;
	/**
	 * @var string
	 */
	protected $password;

	/**
	 * ColissimoRequest constructor.
	 */
	public function __construct()
	{
		$this->enveloppe = new Envelope();
	}

	public function getBody()
	{
		$serializer = SerializerBuilder::create()
			->build()
		;

		return [
			$serializer->serialize($this->enveloppe, "xml"),
		];
	}

	/**
	 * @return string
	 */
	public function getContractNumber()
	{
		return $this->contractNumber;
	}

	/**
	 * @param $contractNumber
	 *
	 * @return $this
	 */
	public function setContractNumber($contractNumber)
	{
		$this->enveloppe->getBody()->getGenerateLabel()->getGenerateLabelRequest()->setContractNumber($contractNumber);
		$this->contractNumber = $contractNumber;
		return $this;
	}

	/**
	 * @return Envelope
	 */
	public function getEnveloppe()
	{
		return $this->enveloppe;
	}

	/**
	 * @param $enveloppe
	 *
	 * @return $this
	 */
	public function setEnveloppe($enveloppe)
	{
		$this->enveloppe = $enveloppe;
		return $this;
	}

	public function getHeaders()
	{
		return [];
	}

	public function getParameters()
	{
		return [];
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param $password
	 *
	 * @return $this
	 */
	public function setPassword($password)
	{
		$this->enveloppe->getBody()->getGenerateLabel()->getGenerateLabelRequest()->setPassword($password);
		$this->password = $password;
		return $this;
	}

}