<?php

namespace Scraper\ScraperColissimo\Entity;

use JMS\Serializer\Annotation as Serializer;

class Messages
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("id")
     */
    protected int $id;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("messageContent")
     */
    protected string $messageContent;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("type")
     */
    protected string $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageContent(): ?string
    {
        return $this->messageContent;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
