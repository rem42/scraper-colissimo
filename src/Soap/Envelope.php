<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://schemas.xmlsoap.org/soap/envelope/", prefix="soapenv")
 * @Serializer\XmlRoot("soapenv:Envelope")
 */
class Envelope
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Header")
     * @Serializer\XmlElement(namespace="http://schemas.xmlsoap.org/soap/envelope/")
     * @Serializer\SerializedName("Header")
     */
    protected Header $header;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\Body")
     * @Serializer\XmlElement(namespace="http://schemas.xmlsoap.org/soap/envelope/")
     * @Serializer\SerializedName("Body")
     */
    protected Body $body;

    public function __construct()
    {
        $this->header = new Header();
        $this->body   = new Body();
    }

    public function getHeader(): Header
    {
        return $this->header;
    }

    public function getBody(): Body
    {
        return $this->body;
    }
}
