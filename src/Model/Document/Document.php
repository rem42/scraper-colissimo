<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Document;

/**
 * Document (commercial invoice, CN23, certificate...) attached to a parcel for dematerialized customs clearance.
 */
final class Document
{
    /**
     * Maximum size accepted by the Documents API (500 Ko).
     */
    public const int MAX_SIZE = 500 * 1024;

    private const array CONTENT_TYPES = [
        'pdf' => 'application/pdf',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'tif' => 'image/tiff',
        'tiff' => 'image/tiff',
    ];

    public string $contentType;

    /** @var list<string> follower parcels of a multi-parcel shipment, when the document is attached to the master parcel */
    public array $parcelNumberList = [];

    public function __construct(
        public string $parcelNumber,
        public string $documentType,
        public string $filename,
        public string $content,
        ?string $contentType = null,
    ) {
        if (\strlen($content) > self::MAX_SIZE) {
            throw new \InvalidArgumentException(\sprintf('Document "%s" is too large (%d bytes), Colissimo accepts at most %d bytes.', $filename, \strlen($content), self::MAX_SIZE));
        }

        $this->contentType = $contentType ?? self::guessContentType($filename);
    }

    public static function fromFile(string $parcelNumber, string $documentType, string $path, ?string $filename = null): self
    {
        if (!is_file($path) || !is_readable($path)) {
            throw new \InvalidArgumentException(\sprintf('File "%s" does not exist or is not readable.', $path));
        }

        $content = file_get_contents($path);

        if (false === $content) {
            throw new \InvalidArgumentException(\sprintf('Unable to read file "%s".', $path));
        }

        return new self($parcelNumber, $documentType, $filename ?? basename($path), $content);
    }

    private static function guessContentType(string $filename): string
    {
        return self::CONTENT_TYPES[strtolower(pathinfo($filename, \PATHINFO_EXTENSION))] ?? 'application/octet-stream';
    }
}
