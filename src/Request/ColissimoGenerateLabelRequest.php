<?php

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Annotation\Scraper;
use Scraper\Scraper\Request\RequestBody;
use Scraper\Scraper\Request\RequestException;
use Scraper\Scraper\Request\RequestHeaders;
use Scraper\ScraperColissimo\Factory\SerializerFactory;
use Scraper\ScraperColissimo\Soap\GenerateLabelRequest;

/**
 * @Scraper(path="generateLabel", method="POST")
 */
class ColissimoGenerateLabelRequest extends ColissimoRequest implements RequestBody, RequestHeaders, RequestException
{
    protected GenerateLabelRequest $generateLabelRequest;

    public function __construct(string $contractNumber, string $password)
    {
        $this->generateLabelRequest = new GenerateLabelRequest();
        $this->generateLabelRequest
            ->setContractNumber($contractNumber)
            ->setPassword($password)
        ;
    }

    public function isThrow(): bool
    {
        return false;
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    public function getBody(): string
    {
        $serializer = SerializerFactory::create();

        return $serializer->serialize($this->generateLabelRequest, 'json');
    }

    public function getGenerateLabelRequest(): GenerateLabelRequest
    {
        return $this->generateLabelRequest;
    }
}
