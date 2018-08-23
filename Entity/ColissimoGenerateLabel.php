<?php

namespace Scraper\ScraperColissimo\Entity;

class ColissimoGenerateLabel
{
	/**
	 * @var Envelope
	 */
	protected $enveloppe;
	/**
	 * @var string
	 */
	protected $file;
	/**
	 * @var string
	 */
	protected $cn23;

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
	 * @return Envelope
	 */
	public function getEnveloppe(): ?Envelope
	{
		return $this->enveloppe;
	}

	/**
	 * @param Envelope $enveloppe
	 *
	 * @return $this
	 */
	public function setEnveloppe(?Envelope $enveloppe)
	{
		$this->enveloppe = $enveloppe;
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
}
