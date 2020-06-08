<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Envelope
 *
 * @Serializer\XmlNamespace(uri="http://schemas.xmlsoap.org/soap/envelope/", prefix="soapenv")
 * @Serializer\XmlRoot("soapenv:Envelope")
 */
class Envelope
{
    /**
     * @var Body
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\Body")
     * @Serializer\XmlElement(namespace="http://schemas.xmlsoap.org/soap/envelope/")
     * @Serializer\SerializedName("Body")
     */
    protected $body;

    /**
     * @return Body
     */
    public function getBody()
    {
        return $this->body;
    }
}
