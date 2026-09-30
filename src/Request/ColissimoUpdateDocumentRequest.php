<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;

/**
 * Replaces a document already stored for a parcel (same document type).
 */
#[Scraper(path: 'updatedocument')]
class ColissimoUpdateDocumentRequest extends ColissimoDocumentRequest {}
