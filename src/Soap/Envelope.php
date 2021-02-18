<?php

namespace Scraper\ScraperColissimo\Soap;

final class Envelope
{
    private Header $header;

    private Body $body;

    public function __construct()
    {
        $this->header = new Header();
        $this->body   = new Body();
    }

    public function getHeader(): Header
    {
        return $this->header;
    }

    public function getBody(): Body
    {
        return $this->body;
    }
}
