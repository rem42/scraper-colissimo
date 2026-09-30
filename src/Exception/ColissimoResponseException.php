<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Exception;

use Scraper\ScraperColissimo\Model\Message;

/**
 * Functional error returned by a Colissimo API (invalid field, unknown parcel, authentication failure...).
 */
class ColissimoResponseException extends ColissimoException
{
    /**
     * @param list<Message> $messages
     */
    public function __construct(
        string $message = '',
        private readonly array $messages = [],
        private readonly int $statusCode = 0,
    ) {
        $details = [];

        foreach ($this->messages as $item) {
            $details[] = '' !== $item->id ? \sprintf('[%s] %s', $item->id, $item->messageContent) : $item->messageContent;
        }

        if ([] !== $details) {
            $message .= ': ' . implode(', ', $details);
        }

        parent::__construct($message, $statusCode);
    }

    /**
     * @return list<Message>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @return list<string>
     */
    public function getErrorCodes(): array
    {
        return array_values(array_map(static fn (Message $message): string => $message->id, $this->messages));
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
