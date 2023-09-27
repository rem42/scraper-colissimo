<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Method;
use Scraper\Scraper\Attribute\Scheme;
use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\ScraperRequest;

#[Scraper(method: Method::GET, scheme: Scheme::HTTPS, host: 'ws.colissimo.fr', path: '/sls-ws/SlsServiceWSRest')]
abstract class ColissimoRequest extends ScraperRequest {}
