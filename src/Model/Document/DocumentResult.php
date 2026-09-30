<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Document;

final class DocumentResult
{
    public const string SUCCESS = '000';

    public string $errorCode = '';
    public ?string $errorLabel = null;

    /** @var list<DocumentError> */
    public array $errors = [];

    /** Storage identifier of the document */
    public ?string $documentId = null;

    public function isSuccess(): bool
    {
        return self::SUCCESS === $this->errorCode;
    }
}
