<?php

namespace Scraper\ScraperColissimo\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\SerializedName;

final class Response
{
    /** @var Collection<int, Message> */
    private Collection $messages;

    /** @SerializedName("labelV2Response") */
    private LabelResponse $labelResponse;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        $this->messages->add($message);

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        $this->messages->removeElement($message);

        return $this;
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
