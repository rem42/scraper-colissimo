<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Method;
use Scraper\Scraper\Attribute\Scheme;
use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\RequestException;
use Scraper\Scraper\Request\ScraperRequest;
use Scraper\ScraperColissimo\Model\Credential;

/**
 * Colissimo errors are described in the response body: HTTP errors are handled by the Api classes.
 */
#[Scraper(method: Method::POST, scheme: Scheme::HTTPS, host: 'ws.colissimo.fr')]
abstract class ColissimoRequest extends ScraperRequest implements RequestException
{
    public function __construct(
        protected readonly Credential $credential,
    ) {}

    public function isThrow(): bool
    {
        return false;
    }

    public function getCredential(): Credential
    {
        return $this->credential;
    }
}
