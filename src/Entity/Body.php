<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://sls.ws.coliposte.fr", prefix="ns2")
 */
class Body
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\GenerateLabelResponse")
     * @Serializer\XmlElement(namespace="http://sls.ws.coliposte.fr")
     * @Serializer\SerializedName("generateLabelResponse")
     */
    protected GenerateLabelResponse $generateLabelResponse;

    public function getGenerateLabelResponse(): GenerateLabelResponse
    {
        return $this->generateLabelResponse;
    }
}
