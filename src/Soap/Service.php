<?php

namespace Scraper\ScraperColissimo\Soap;

final class Service
{
    public static string $A2P = 'A2P';

    public static string $BPR = 'BPR';

    public static string $ACP = 'ACP';

    public static string $CDI = 'CDI';

    public static string $CMT = 'CMT';

    public static string $BDP = 'BDP';

    public static string $PCS = 'PCS';

    public static string $DOM = 'DOM';

    public static string $DOS = 'DOS';

    public static string $BOS = 'BOS';

    public static string $BOM = 'BOM';

    public static string $RECOMMENDATIONLEVEL_R1 = 'R1';

    public static string $RECOMMENDATIONLEVEL_R2 = 'R2';

    public static string $RECOMMENDATIONLEVEL_R3 = 'R3';

    private string $productCode;

    private \DateTime $depositDate;

    private ?bool $mailBoxPicking = false;

    private ?\DateTime $mailBoxPickingDate = null;

    private int $transportationAmount = 0;

    private ?int $totalAmount = null;

    private ?string $orderNumber = null;

    private ?string $commercialName = null;

    private ?string $returnTypeChoice = null;

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): self
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getDepositDate(): \DateTime
    {
        return $this->depositDate;
    }

    public function setDepositDate(\DateTime $depositDate): self
    {
        $this->depositDate = $depositDate;

        return $this;
    }

    public function getMailBoxPicking(): ?bool
    {
        return $this->mailBoxPicking;
    }

    public function setMailBoxPicking(?bool $mailBoxPicking = null): self
    {
        $this->mailBoxPicking = $mailBoxPicking;

        return $this;
    }

    public function getMailBoxPickingDate(): ?\DateTime
    {
        return $this->mailBoxPickingDate;
    }

    public function setMailBoxPickingDate(?\DateTime $mailBoxPickingDate = null): self
    {
        $this->mailBoxPickingDate = $mailBoxPickingDate;

        return $this;
    }

    public function getTransportationAmount(): int
    {
        return $this->transportationAmount;
    }

    public function setTransportationAmount(int $transportationAmount): self
    {
        $this->transportationAmount = $transportationAmount;

        return $this;
    }

    public function getTotalAmount(): ?int
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(?int $totalAmount = null): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(?string $orderNumber = null): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getCommercialName(): ?string
    {
        return $this->commercialName;
    }

    public function setCommercialName(?string $commercialName = null): self
    {
        $this->commercialName = $commercialName;

        return $this;
    }

    public function getReturnTypeChoice(): ?string
    {
        return $this->returnTypeChoice;
    }

    public function setReturnTypeChoice(?string $returnTypeChoice = null): self
    {
        $this->returnTypeChoice = $returnTypeChoice;

        return $this;
    }
}
