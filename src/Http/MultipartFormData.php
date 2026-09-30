<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Http;

/**
 * Minimal "multipart/form-data" body builder, used to upload documents to the Colissimo Documents API.
 */
final class MultipartFormData
{
    private readonly string $boundary;

    /** @var list<string> */
    private array $parts = [];

    public function __construct(?string $boundary = null)
    {
        $this->boundary = $boundary ?? 'colissimo-' . bin2hex(random_bytes(16));
    }

    public function addField(string $name, string $value): self
    {
        $this->parts[] = \sprintf(
            "Content-Disposition: form-data; name=\"%s\"\r\n\r\n%s",
            self::escape($name),
            $value,
        );

        return $this;
    }

    public function addFile(string $name, string $filename, string $content, string $contentType = 'application/octet-stream'): self
    {
        $this->parts[] = \sprintf(
            "Content-Disposition: form-data; name=\"%s\"; filename=\"%s\"\r\nContent-Type: %s\r\n\r\n%s",
            self::escape($name),
            self::escape($filename),
            $contentType,
            $content,
        );

        return $this;
    }

    public function getContentType(): string
    {
        return 'multipart/form-data; boundary=' . $this->boundary;
    }

    public function getBody(): string
    {
        $body = '';

        foreach ($this->parts as $part) {
            $body .= '--' . $this->boundary . "\r\n" . $part . "\r\n";
        }

        return $body . '--' . $this->boundary . "--\r\n";
    }

    private static function escape(string $value): string
    {
        return str_replace(['"', "\r", "\n"], ['%22', '%0D', '%0A'], $value);
    }
}
