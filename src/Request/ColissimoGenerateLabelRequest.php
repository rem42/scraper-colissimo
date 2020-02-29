<?php

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Annotation\Scraper;

/**
 * @Scraper(path="/sls-ws/SlsServiceWS?wsdl", responseAdapter="Scraper\ScraperColissimo\Adapter\ColissimoAdapter")
 */
class ColissimoGenerateLabelRequest extends ColissimoRequest
{
    public function isDoRequest()
    {
        return true;
    }

    public function getAction()
    {
        return 'generateLabel';
    }

    public function getVersion()
    {
        return '2.0';
    }
}
