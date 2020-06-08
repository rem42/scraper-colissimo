<?php

namespace Scraper\ScraperColissimo\Api;

use Scraper\Scraper\Annotation\UrlAnnotation;
use Scraper\Scraper\Api\ApiInterface;
use Scraper\Scraper\Request\Request;

abstract class ColissimoApi implements ApiInterface
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var mixed
     */
    protected $data;
    /**
     * @var UrlAnnotation
     */
    protected $urlAnnotation;
    /**
     * @var mixed
     */
    protected $object;

    /**
     * ColissimoApi constructor.
     */
    public function __construct(Request $request, $data, UrlAnnotation $urlAnnotation)
    {
        $this->request       = $request;
        $this->data          = $data;
        $this->urlAnnotation = $urlAnnotation;
    }
}
