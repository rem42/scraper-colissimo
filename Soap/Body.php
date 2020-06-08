<?php

namespace Scraper\ScraperColissimo\Soap;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Body
 *
 * @Serializer\XmlNamespace(uri="http://sls.ws.coliposte.fr", prefix="sls")
 */
class Body
{
    /**
     * @var GenerateLabel
     * @Serializer\Type("Scraper\ScraperColissimo\Soap\GenerateLabel")
     * @Serializer\XmlElement(namespace="http://sls.ws.coliposte.fr")
     * @Serializer\SerializedName("generateLabel")
     */
    protected $generateLabel;

    /**
     * Body constructor.
     */
    public function __construct()
    {
        $this->generateLabel = new GenerateLabel();
    }

    /**
     * @return GenerateLabel
     */
    public function getGenerateLabel(): ?GenerateLabel
    {
        return $this->generateLabel;
    }

    /**
     * @param GenerateLabel $generateLabel
     *
     * @return $this
     */
    public function setGenerateLabel(?GenerateLabel $generateLabel)
    {
        $this->generateLabel = $generateLabel;
        return $this;
    }
}
