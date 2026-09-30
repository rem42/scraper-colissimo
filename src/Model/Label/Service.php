<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Service
{
    public const int RETURN_TYPE_CHOICE_PRIORITY = 2;
    public const int RETURN_TYPE_CHOICE_DO_NOT_RETURN = 3;

    public const string RESEAU_POSTAL_DPD = '0';
    public const string RESEAU_POSTAL_LOCAL = '1';

    public \DateTimeInterface $depositDate;

    public ?bool $mailBoxPicking = null;
    public ?\DateTimeInterface $mailBoxPickingDate = null;
    // Base transportation price in cents
    public ?int $transportationAmount = null;
    // Transportation price with options in cents, mandatory when a CN23 is required
    public ?int $totalAmount = null;
    public ?string $orderNumber = null;
    // Mandatory for the HD product code
    public ?string $commercialName = null;
    public ?int $returnTypeChoice = null;
    public ?string $reseauPostal = null;

    public function __construct(
        public string $productCode = ProductCode::DOM,
        ?\DateTimeInterface $depositDate = null,
    ) {
        $this->depositDate = $depositDate ?? new \DateTimeImmutable();
    }
}
