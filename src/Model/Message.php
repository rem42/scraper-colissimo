<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model;

final class Message
{
    public const string TYPE_ERROR = 'ERROR';
    public const string TYPE_INFOS = 'INFOS';
    public const string TYPE_WARNING = 'WARNING';

    public function __construct(
        public string $id = '',
        public string $type = '',
        public string $messageContent = '',
    ) {}

    public function isError(): bool
    {
        return self::TYPE_ERROR === strtoupper($this->type);
    }
}
