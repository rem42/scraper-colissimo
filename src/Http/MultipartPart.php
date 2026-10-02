<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Http;

final readonly class MultipartPart
{
    /**
     * @param array<string, string> $headers lower-cased header names
     */
    public function __construct(
        public array $headers,
        public string $body,
    ) {}

    public function getHeader(string $name): ?string
    {
        return $this->headers[strtolower($name)] ?? null;
    }

    /**
     * Content-ID without the surrounding chevrons, e.g. "jsonInfos", "label", "cn23".
     */
    public function getContentId(): ?string
    {
        $contentId = $this->getHeader('content-id');

        if (null === $contentId) {
            return null;
        }

        return trim($contentId, " <>\t");
    }

    public function isJson(): bool
    {
        return str_contains(strtolower($this->getHeader('content-type') ?? ''), 'json');
    }
}
