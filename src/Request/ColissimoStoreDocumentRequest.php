<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;

/**
 * Stores a new document attached to a parcel.
 */
#[Scraper(path: 'storedocument')]
class ColissimoStoreDocumentRequest extends ColissimoDocumentRequest {}
