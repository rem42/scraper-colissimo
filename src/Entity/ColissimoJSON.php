<?php declare(strict_types=1);

namespace Scraper\ScraperColissimo\Entity;

final class ColissimoJSON
{
    private string $json;
    private ?string $file = null;
    private ?string $cn23 = null;

    public function getCn23(): ?string
    {
        return $this->cn23;
    }

    public function setCn23(string $cn23 = null): self
    {
        $this->cn23 = $cn23;
        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function getJson(): ?string
    {
        return $this->json;
    }

    public function setJson(string $json): self
    {
        $this->json = $json;
        return $this;
    }
}
