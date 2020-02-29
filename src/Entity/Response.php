<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

class Response
{
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\Messages")
     * @Serializer\SerializedName("messages")
     */
    protected Messages $messages;
    /**
     * @Serializer\Type("Scraper\ScraperColissimo\Entity\LabelResponse")
     * @Serializer\SerializedName("labelResponse")
     */
    protected LabelResponse $labelResponse;

    public function getMessages(): ?Messages
    {
        return $this->messages;
    }

    public function getLabelResponse(): ?LabelResponse
    {
        return $this->labelResponse;
    }
}
