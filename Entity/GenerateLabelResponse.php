<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class GenerateLabelResponse
 */
class GenerateLabelResponse
{
    /**
     * @var Response
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\Response")
     * @Serializer\SerializedName("return")
     */
    protected $return;

    /**
     * @return Response
     */
    public function getReturn()
    {
        return $this->return;
    }
}
