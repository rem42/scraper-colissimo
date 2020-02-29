<?php

namespace Scraper\ScraperColissimo\Request;

use JMS\Serializer\SerializerBuilder;
use Scraper\Scraper\Annotation\Scraper;
use Scraper\Scraper\Request\ScraperRequest;
use Scraper\ScraperColissimo\Soap\Envelope;

/**
 * @Scraper(scheme="HTTPS", host="ws.colissimo.fr", protocol="SOAP")
 */
abstract class ColissimoRequest extends ScraperRequest
{
    protected Envelope $envelope;

    public function __construct(string $contractNumber, string $password)
    {
        $this->envelope = new Envelope();
        $this->envelope
            ->getBody()
            ->getGenerateLabel()
            ->getGenerateLabelRequest()
                ->setContractNumber($contractNumber)
                ->setPassword($password)
        ;
    }

    public function getBody()
    {
        $serializer = SerializerBuilder::create()->build();

        return [$serializer->serialize($this->envelope, 'xml')];
    }

    public function getEnvelope(): Envelope
    {
        return $this->envelope;
    }
}
