<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Document;

/**
 * Functional nature of a document stored with the Colissimo Documents API.
 */
final class DocumentType
{
    public const string COMMERCIAL_INVOICE = 'COMMERCIAL_INVOICE';
    public const string CN23 = 'CN23';
    public const string CERTIFICATE_OF_ORIGIN = 'CERTIFICATE_OF_ORIGIN';
    public const string EXPORT_LICENSE = 'EXPORT_LICENSE';
    public const string OTHER = 'OTHER';

    // Only returned when consulting documents
    public const string C50 = 'C50';
    public const string COMPENSATION = 'COMPENSATION';
    public const string DAU = 'DAU';
    public const string DELIVERY_CERTIFICATE = 'DELIVERY_CERTIFICATE';
    public const string SIGNATURE = 'SIGNATURE';
}
