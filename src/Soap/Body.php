<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://sls.ws.coliposte.fr", prefix="sls")
 */
class Body
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\GenerateLabel")
     * @Serializer\XmlElement(namespace="http://sls.ws.coliposte.fr")
     * @Serializer\SerializedName("generateLabel")
     */
    protected GenerateLabel $generateLabel;

    /**
     * Body constructor.
     */
    public function __construct()
    {
        $this->generateLabel = new GenerateLabel();
    }

    public function getGenerateLabel(): ?GenerateLabel
    {
        return $this->generateLabel;
    }
}
