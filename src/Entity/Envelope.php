<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://schemas.xmlsoap.org/soap/envelope/", prefix="soapenv")
 * @Serializer\XmlRoot("soapenv:Envelope")
 */
class Envelope
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\Body")
     * @Serializer\XmlElement(namespace="http://schemas.xmlsoap.org/soap/envelope/")
     * @Serializer\SerializedName("Body")
     */
    protected Body $body;

    public function getBody(): Body
    {
        return $this->body;
    }
}
