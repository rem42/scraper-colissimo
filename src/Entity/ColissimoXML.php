<?php

namespace Scraper\ScraperColissimo\Entity;

class ColissimoXML
{
    protected string $xml;
    protected string $file;
    protected string $cn23;

    /**
     * @return string
     */
    public function getCn23(): ?string
    {
        return $this->cn23;
    }

    /**
     * @param string $cn23
     *
     * @return $this
     */
    public function setCn23(?string $cn23)
    {
        $this->cn23 = $cn23;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string $file
     *
     * @return $this
     */
    public function setFile(?string $file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getXml(): ?string
    {
        return $this->xml;
    }

    /**
     * @param string $xml
     *
     * @return $this
     */
    public function setXml(?string $xml)
    {
        $this->xml = $xml;
        return $this;
    }
}
