<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

/**
 * Keys accepted in the `fields.field` block of generateLabel.
 */
final class FieldKey
{
    // Delegation (logisticians / marketplaces): Colissimo account the label is generated for
    public const string ACCOUNT_NUMBER = 'ACCOUNT_NUMBER';

    // Parcel size in centimeters
    public const string LENGTH = 'LENGTH';
    public const string WIDTH = 'WIDTH';
    public const string HEIGHT = 'HEIGHT';

    // Customs: sender EORI (mandatory for the United States, 2 letters + 9 digits) and addressee EORI
    public const string EORI = 'EORI';
    public const string EORI_ADDRESSEE = 'EORI_ADRESSEE';
    // Australian GST registration
    public const string GST = 'GST';

    // Specific output format for the CN23 (use a "_UL" format identical to outputPrintingType for a unified label)
    public const string OUTPUT_PRINT_TYPE_CN23 = 'OUTPUT_PRINT_TYPE_CN23';

    // Multi-parcel shipments ("Groupage de colis")
    public const string TYPE_MULTI_PARCEL = 'TYPE_MULTI_PARCEL';
    public const string PARCEL_ITERATION_NUMBER = 'PARCEL_ITERATION_NUMBER';
    public const string TOTAL_NUMBER_PARCEL = 'TOTAL_NUMBER_PARCEL';
    public const string LIST_FOLLOWER_PARCEL = 'LIST_FOLLOWER_PARCEL';
    public const string MULTI_PARCEL_MASTER = 'MASTER';
    public const string MULTI_PARCEL_FOLLOWER = 'FOLLOWER';

    // Label customisation
    public const string PRINT_CUSTOMER_BARCODE = 'PRINT_CUSTOMER_BARCODE';
    public const string CUSTOMER_BARCODE = 'CUSTOMER_BARCODE';
    public const string PRINT_CUSTOMER_LABEL = 'PRINT_CUSTOMER_LABEL';
    public const string CUSTOMER_LABEL = 'CUSTOMER_LABEL';

    // Search references in the Colissimo tracking tool
    public const string CUSER_INFO_TEXT = 'CUSER_INFO_TEXT';
    public const string CUSER_INFO_TEXT_4 = 'CUSER_INFO_TEXT_4';

    // Buy Now Pay Later transaction id
    public const string BNPL = 'BNPL';
}
