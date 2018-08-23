<?php

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Annotation\UrlAnnotation;

/**
 * Class ColissimoGenerateLabelRequest
 * @package Scraper\ScraperColissimo\Request
 *
 * @UrlAnnotation(url="/sls-ws/SlsServiceWS?wsdl", contentType="Scraper\ScraperColissimo\ContentType\ColissimoXMLContentType")
 */
class ColissimoGenerateLabelRequest extends ColissimoRequest
{

}
