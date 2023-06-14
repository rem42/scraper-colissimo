<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Entity;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class Response
{
    /** @var array<int, Message> */
    public array $messages = [];

    #[SerializedName(serializedName: 'labelV2Response')]
    public LabelResponse $labelResponse;

    public function addMessage(Message $message): self
    {
        $this->messages[] = $message;

        return $this;
    }
}
