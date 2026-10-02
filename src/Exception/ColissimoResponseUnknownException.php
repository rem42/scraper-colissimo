<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Exception;

/**
 * The Colissimo response cannot be interpreted (unexpected format, empty body, server error page...).
 */
class ColissimoResponseUnknownException extends ColissimoException
{
    public function __construct(
        string $message = '',
        private readonly int $statusCode = 0,
        private readonly string $content = '',
    ) {
        parent::__construct($message, $statusCode);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
