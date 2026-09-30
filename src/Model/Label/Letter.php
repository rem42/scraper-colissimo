<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

final class Letter
{
    public Service $service;
    public Parcel $parcel;
    public ?CustomsDeclarations $customsDeclarations = null;
    public Sender $sender;
    public Addressee $addressee;
    public ?Address $codSenderAddress = null;

    public function __construct(
        ?Service $service = null,
        ?Parcel $parcel = null,
        ?Sender $sender = null,
        ?Addressee $addressee = null,
    ) {
        $this->service = $service ?? new Service();
        $this->parcel = $parcel ?? new Parcel();
        $this->sender = $sender ?? new Sender();
        $this->addressee = $addressee ?? new Addressee();
    }
}
