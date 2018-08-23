<?php

namespace Scraper\ScraperColissimo\Api;

use JMS\Serializer\SerializerBuilder;
use Scraper\ScraperColissimo\Entity\ColissimoGenerateLabel;
use Scraper\ScraperColissimo\Entity\ColissimoXML;
use Scraper\ScraperColissimo\Entity\Envelope;
use Scraper\ScraperColissimo\Request\ColissimoGenerateLabelRequest;

class ColissimoGenerateLabelApi extends ColissimoApi
{
	/**
	 * @var ColissimoGenerateLabelRequest
	 */
	protected $request;

	/**
	 * @var ColissimoXML
	 */
	protected $data;

	public function execute()
	{
		$colissimoGenerateLabel = new ColissimoGenerateLabel();
		$serializer             = SerializerBuilder::create()
			->build()
		;
		$enveloppe              = $serializer->deserialize($this->data->getXml(), Envelope::class, "xml");
		$colissimoGenerateLabel->setEnveloppe($enveloppe);
		$colissimoGenerateLabel->setFile($this->data->getFile());
		if ($this->data->getCn23() !== null && strlen($this->data->getCn23()) > 0) {
			$colissimoGenerateLabel->setCn23($this->data->getCn23());
		}

		return $colissimoGenerateLabel;
	}
}
