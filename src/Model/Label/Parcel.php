<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

use Symfony\Component\Serializer\Attribute\SerializedName;

final class Parcel
{
    // Insured value in cents
    public ?int $insuranceValue = null;
    public ?string $recommendationLevel = null;
    public ?bool $nonMachinable = null;
    public ?bool $returnReceipt = null;
    // Delivery instructions displayed on the label (max 35 characters)
    public ?string $instructions = null;
    // Pick-up point id, mandatory for the HD product code
    public ?string $pickupLocationId = null;
    // Mandatory (true) for overseas departments shipments
    public ?bool $ftd = null;
    // Delivered Duty Paid
    public ?bool $ddp = null;
    public ?string $disabledDeliveryBlockingCode = null;
    public ?bool $hazmatFlag = null;
    public ?string $hazmatCategory = null;
    public ?bool $hazmatPrintLogo = null;

    // Cash on delivery
    #[SerializedName('cod')]
    public ?bool $cod = null;

    // Cash on delivery amount in cents
    #[SerializedName('codamount')]
    public ?int $codAmount = null;

    #[SerializedName('codcurrency')]
    public ?string $codCurrency = null;

    public function __construct(
        // Weight in kg
        public float $weight = 0.0,
    ) {}
}
