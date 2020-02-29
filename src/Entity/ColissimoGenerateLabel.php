<?php

namespace Scraper\ScraperColissimo\Entity;

class ColissimoGenerateLabel
{
    protected Envelope $enveloppe;
    protected string $file;
    protected string $cn23;

    public function getEnveloppe(): ?Envelope
    {
        return $this->enveloppe;
    }

    public function setEnveloppe(Envelope $enveloppe): self
    {
        $this->enveloppe = $enveloppe;

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

    public function getCn23(): ?string
    {
        return $this->cn23;
    }

    public function setCn23(string $cn23): self
    {
        $this->cn23 = $cn23;

        return $this;
    }
}
