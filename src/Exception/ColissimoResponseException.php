<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Exception;

class ColissimoResponseException extends ColissimoException
{
    /**
     * @param array<\stdClass> $data
     */
    public function __construct(
        string $message = '',
        protected array $data = [],
    ) {
        $dataMessage = [];

        foreach ($this->data as $datum) {
            $dataMessage[] = $datum->messageContent;
        }

        $message .= implode(', ', $dataMessage);

        parent::__construct($message);
    }

    /**
     * @return array<\stdClass>
     */
    public function getData(): array
    {
        return $this->data;
    }
}
