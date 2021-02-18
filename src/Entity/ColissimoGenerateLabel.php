<?php

namespace Scraper\ScraperColissimo\Entity;

final class ColissimoGenerateLabel
{
    private Response $response;
    private ?string $file = null;
    private ?string $cn23 = null;

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file = null): self
    {
        $this->file = $file;

        return $this;
    }

    public function getCn23(): ?string
    {
        return $this->cn23;
    }

    public function setCn23(?string $cn23 = null): self
    {
        $this->cn23 = $cn23;

        return $this;
    }
}
