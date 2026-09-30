<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

/**
 * Body of the SLS v3.1 generateLabel method.
 */
final class GenerateLabel
{
    /**
     * A master parcel can reference at most 5 parcels in LIST_FOLLOWER_PARCEL.
     */
    public const int MULTI_PARCEL_MAX_PARCELS = 5;

    public OutputFormat $outputFormat;
    public Letter $letter;
    public ?Fields $fields = null;

    public function __construct(
        ?OutputFormat $outputFormat = null,
        ?Letter $letter = null,
    ) {
        $this->outputFormat = $outputFormat ?? new OutputFormat();
        $this->letter = $letter ?? new Letter();
    }

    public function setField(string $key, string $value): self
    {
        $this->fields ??= new Fields();
        $this->fields->set($key, $value);

        return $this;
    }

    public function getField(string $key): ?string
    {
        return $this->fields?->get($key);
    }

    /**
     * Label generated on behalf of another Colissimo account (logisticians, marketplaces).
     */
    public function setAccountNumber(string $accountNumber): self
    {
        return $this->setField(FieldKey::ACCOUNT_NUMBER, $accountNumber);
    }

    /**
     * Sender EORI (mandatory for shipments to the United States without DDP) and optional addressee EORI.
     */
    public function setEori(string $senderEori, ?string $addresseeEori = null): self
    {
        $this->setField(FieldKey::EORI, $senderEori);

        if (null !== $addresseeEori) {
            $this->setField(FieldKey::EORI_ADDRESSEE, $addresseeEori);
        }

        return $this;
    }

    /**
     * Parcel dimensions in centimeters.
     */
    public function setDimensions(int $length, int $width, int $height): self
    {
        return $this
            ->setField(FieldKey::LENGTH, (string) $length)
            ->setField(FieldKey::WIDTH, (string) $width)
            ->setField(FieldKey::HEIGHT, (string) $height)
        ;
    }

    /**
     * Prints the CN23 with a specific format. Use the same "_UL" format as the label for a unified label + CN23 page.
     */
    public function setCn23OutputPrintingType(string $outputPrintingType): self
    {
        return $this->setField(FieldKey::OUTPUT_PRINT_TYPE_CN23, $outputPrintingType);
    }

    /**
     * Multi-parcel shipment: marks this label as a follower parcel (generate followers first).
     */
    public function setMultiParcelFollower(int $iteration, int $totalNumberOfParcels): self
    {
        self::assertMultiParcel($iteration, $totalNumberOfParcels);

        return $this
            ->setField(FieldKey::TYPE_MULTI_PARCEL, FieldKey::MULTI_PARCEL_FOLLOWER)
            ->setField(FieldKey::PARCEL_ITERATION_NUMBER, (string) $iteration)
            ->setField(FieldKey::TOTAL_NUMBER_PARCEL, (string) $totalNumberOfParcels)
        ;
    }

    /**
     * Multi-parcel shipment: marks this label as the master parcel, referencing the already generated follower parcels.
     *
     * @param list<string> $followerParcelNumbers
     */
    public function setMultiParcelMaster(int $iteration, int $totalNumberOfParcels, array $followerParcelNumbers): self
    {
        self::assertMultiParcel($iteration, $totalNumberOfParcels);

        if ([] === $followerParcelNumbers) {
            throw new \InvalidArgumentException('A master parcel must reference at least one follower parcel.');
        }

        if (\count($followerParcelNumbers) > self::MULTI_PARCEL_MAX_PARCELS) {
            throw new \InvalidArgumentException(\sprintf('A master parcel can reference at most %d follower parcels.', self::MULTI_PARCEL_MAX_PARCELS));
        }

        return $this
            ->setField(FieldKey::TYPE_MULTI_PARCEL, FieldKey::MULTI_PARCEL_MASTER)
            ->setField(FieldKey::PARCEL_ITERATION_NUMBER, (string) $iteration)
            ->setField(FieldKey::TOTAL_NUMBER_PARCEL, (string) $totalNumberOfParcels)
            ->setField(FieldKey::LIST_FOLLOWER_PARCEL, implode('/', $followerParcelNumbers))
        ;
    }

    private static function assertMultiParcel(int $iteration, int $totalNumberOfParcels): void
    {
        if ($totalNumberOfParcels < 2) {
            throw new \InvalidArgumentException('A multi-parcel shipment contains at least 2 parcels.');
        }

        if ($iteration < 1 || $iteration > $totalNumberOfParcels) {
            throw new \InvalidArgumentException(\sprintf('Parcel iteration must be between 1 and %d, %d given.', $totalNumberOfParcels, $iteration));
        }
    }
}
