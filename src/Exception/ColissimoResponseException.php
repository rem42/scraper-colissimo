<?php

namespace Scraper\ScraperColissimo\Exception;

class ColissimoResponseException extends ColissimoException
{
    /** @var \stdClass[] */
    protected array $data = [];

    /**
     * @param \stdClass[] $data
     */
    public function __construct(string $message = '', array $data = [])
    {
        $this->data  = $data;
        $dataMessage = [];

        foreach ($data as $datum) {
            $dataMessage[] = $datum->messageContent;
        }

        $message .= implode(', ', $dataMessage);

        parent::__construct($message);
    }

    /**
     * @return \stdClass[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}
