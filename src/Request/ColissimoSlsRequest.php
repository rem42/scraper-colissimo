<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\RequestBody;
use Scraper\Scraper\Request\RequestHeaders;
use Scraper\ScraperColissimo\Factory\SerializerFactory;
use Scraper\ScraperColissimo\Model\Credential;

/**
 * SLS (Simple Label Solution) REST web service, version 3.1, authenticated with the Colissimo Box API key.
 */
#[Scraper(path: '/sls-ws/SlsServiceWSRest/' . self::VERSION)]
abstract class ColissimoSlsRequest extends ColissimoRequest implements RequestHeaders, RequestBody
{
    public const string VERSION = '3.1';

    public function __construct(Credential $credential)
    {
        if (!$credential->isApiKey()) {
            throw new \InvalidArgumentException('The Colissimo SLS web service v3 only accepts an API key: use Credential::apiKey().');
        }

        parent::__construct($credential);
    }

    public function getHeaders(): array
    {
        return [
            // 'apiKey' => (string) $this->credential->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'multipart/mixed, application/json',
        ];
    }

    public function getBody(): string
    {
        return SerializerFactory::getShared()->serialize($this->getPayload(), 'json', SerializerFactory::REQUEST_CONTEXT);
    }

    /**
     * @return array<string, mixed>|object
     */
    abstract protected function getPayload(): array|object;
}
