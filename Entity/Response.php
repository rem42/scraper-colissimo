<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Response
 */
class Response
{
    /**
     * @var Messages
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\Messages")
     * @Serializer\SerializedName("messages")
     */
    protected $messages;
    /**
     * @var LabelResponse
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\LabelResponse")
     * @Serializer\SerializedName("labelResponse")
     */
    protected $labelResponse;

    /**
     * @return LabelResponse
     */
    public function getLabelResponse()
    {
        return $this->labelResponse;
    }

    /**
     * @return Messages
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
