<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Exception;

class ColissimoResponseException extends ColissimoException
{
    /** @var array<\stdClass> */
    protected array $data = [];

    /**
     * @param array<\stdClass> $data
     */
    public function __construct(string $message = '', array $data = [])
    {
        $this->data = $data;
        $dataMessage = [];

        foreach ($data as $datum) {
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
