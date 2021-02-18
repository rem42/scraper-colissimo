<?php

namespace Scraper\ScraperColissimo\Entity;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class Response
{
    /** @var array<Message> */
    private array $messages;

    /** @SerializedName("labelV2Response") */
    private LabelResponse $labelResponse;

    public function addMessage(Message $message): self
    {
        $this->messages[] = $message;
        return $this;
    }

    /**
     * @param array<Message> $messages
     */
    public function setMessages(array $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    public function getLabelResponse(): LabelResponse
    {
        return $this->labelResponse;
    }

    public function setLabelResponse(LabelResponse $labelResponse): self
    {
        $this->labelResponse = $labelResponse;

        return $this;
    }
}
