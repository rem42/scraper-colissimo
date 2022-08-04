<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Method;
use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\RequestBody;
use Scraper\Scraper\Request\RequestException;
use Scraper\Scraper\Request\RequestHeaders;
use Scraper\ScraperColissimo\Factory\SerializerFactory;
use Scraper\ScraperColissimo\Rest\GenerateLabelRequest;

/**
 * @Scraper(path="generateLabel", method="POST")
 */
#[Scraper(method: Method::POST, path: 'generateLabel')]
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
        return SerializerFactory::create()
            ->serialize($this->generateLabelRequest, 'json')
        ;
    }

    public function getGenerateLabelRequest(): GenerateLabelRequest
    {
        return $this->generateLabelRequest;
    }
}
