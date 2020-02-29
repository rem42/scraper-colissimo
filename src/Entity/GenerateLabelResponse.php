<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

class GenerateLabelResponse
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\Response")
     * @Serializer\SerializedName("return")
     */
    protected Response $return;

    public function getReturn(): Response
    {
        return $this->return;
    }
}
