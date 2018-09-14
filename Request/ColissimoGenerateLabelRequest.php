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
	public function isDoRequest(){
		return true;
	}

	public function getAction(){
		return 'generateLabel';
	}

	public function getVersion(){
		return '2.0';
	}
}
