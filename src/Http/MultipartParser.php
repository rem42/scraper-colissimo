<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Http;

/**
 * Parses the MTOM/XOP "multipart/mixed" responses returned by the Colissimo SLS web service.
 *
 * Parts are identified by their MIME headers (Content-ID, Content-Type), never by their position,
 * as recommended by the Colissimo documentation.
 */
final class MultipartParser
{
    /**
     * @return list<MultipartPart>
     */
    public static function parse(string $content, ?string $contentTypeHeader = null): array
    {
        $boundary = self::extractBoundary($contentTypeHeader) ?? self::guessBoundary($content);

        if (null === $boundary) {
            return [];
        }

        $segments = explode('--' . $boundary, $content);
        // Everything before the first delimiter is the preamble
        array_shift($segments);

        $parts = [];

        foreach ($segments as $segment) {
            // Closing delimiter "--boundary--"
            if (str_starts_with($segment, '--')) {
                break;
            }

            $part = self::parsePart($segment);

            if (null !== $part) {
                $parts[] = $part;
            }
        }

        return $parts;
    }

    public static function extractBoundary(?string $contentTypeHeader): ?string
    {
        if (null === $contentTypeHeader || '' === $contentTypeHeader) {
            return null;
        }

        if (1 !== preg_match('/boundary\s*=\s*(?:"([^"]+)"|([^;\s]+))/i', $contentTypeHeader, $matches)) {
            return null;
        }

        $boundary = '' !== $matches[1] ? $matches[1] : ($matches[2] ?? '');

        return '' !== $boundary ? $boundary : null;
    }

    /**
     * Fallback when the Content-Type header is unavailable: the first non-empty line of a multipart body is "--boundary".
     */
    private static function guessBoundary(string $content): ?string
    {
        $content = ltrim($content, "\r\n");

        if (!str_starts_with($content, '--')) {
            return null;
        }

        $end = strcspn($content, "\r\n");
        $boundary = rtrim(substr($content, 2, $end - 2));

        return '' !== $boundary ? $boundary : null;
    }

    private static function parsePart(string $segment): ?MultipartPart
    {
        // Remove the line break that follows the delimiter
        $segment = preg_replace('/^[ \t]*\r?\n/', '', $segment, 1) ?? $segment;

        $separator = strpos($segment, "\r\n\r\n");
        $separatorLength = 4;

        if (false === $separator) {
            $separator = strpos($segment, "\n\n");
            $separatorLength = 2;
        }

        if (false === $separator) {
            return null;
        }

        $headers = self::parseHeaders(substr($segment, 0, $separator));
        $body = substr($segment, $separator + $separatorLength);

        // The line break preceding the next delimiter belongs to the delimiter, not to the body
        if (str_ends_with($body, "\r\n")) {
            $body = substr($body, 0, -2);
        } elseif (str_ends_with($body, "\n")) {
            $body = substr($body, 0, -1);
        }

        if ('base64' === strtolower($headers['content-transfer-encoding'] ?? '')) {
            $decoded = base64_decode($body, true);
            $body = false !== $decoded ? $decoded : $body;
        }

        return new MultipartPart($headers, $body);
    }

    /**
     * @return array<string, string>
     */
    private static function parseHeaders(string $rawHeaders): array
    {
        $headers = [];

        foreach (preg_split('/\r?\n/', $rawHeaders) ?: [] as $line) {
            $position = strpos($line, ':');

            if (false === $position) {
                continue;
            }

            $headers[strtolower(trim(substr($line, 0, $position)))] = trim(substr($line, $position + 1));
        }

        return $headers;
    }
}
