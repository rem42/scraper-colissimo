<?php

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Annotation\Scraper;
use Scraper\Scraper\Request\ScraperRequest;

/**
 * @Scraper(scheme="HTTPS", host="ws.colissimo.fr", path="/sls-ws/SlsServiceWSRest/2.0")
 */
abstract class ColissimoRequest extends ScraperRequest
{
}
