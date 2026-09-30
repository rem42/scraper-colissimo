<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Request;

use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\RequestBodyJson;
use Scraper\Scraper\Request\RequestHeaders;
use Scraper\ScraperColissimo\Model\Credential;

/**
 * Timeline tracking web service (timelineCompany): every known event and step of a parcel.
 */
#[Scraper(path: '/tracking-timeline-ws/rest/tracking/timelineCompany')]
class ColissimoTrackingTimelineRequest extends ColissimoRequest implements RequestHeaders, RequestBodyJson
{
    public const string LANG_FR = 'fr_FR';
    public const string LANG_EN = 'en_GB';
    public const string LANG_DE = 'de_DE';
    public const string LANG_ES = 'es_ES';
    public const string LANG_IT = 'it_IT';
    public const string LANG_NL = 'nl_NL';

    public function __construct(
        Credential $credential,
        // Parcel number, partner reference or non-delivery notice number
        protected string $parcelNumber,
        protected string $lang = self::LANG_FR,
    ) {
        parent::__construct($credential);
    }

    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    public function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function getJson(): array
    {
        $credential = $this->credential->toArray();

        return [
            ...$credential,
            'parcelNumber' => $this->parcelNumber,
            'lang' => $this->lang,
        ];
    }
}
