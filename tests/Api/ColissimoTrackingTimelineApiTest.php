<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Tests\Api;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Scraper\ScraperColissimo\Api\ColissimoTrackingTimelineApi;
use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Model\Credential;
use Scraper\ScraperColissimo\Model\Tracking\Step;
use Scraper\ScraperColissimo\Model\Tracking\Timeline;
use Scraper\ScraperColissimo\Request\ColissimoTrackingTimelineRequest;
use Scraper\ScraperColissimo\Tests\ClientTrait;

/**
 * @internal
 */
#[CoversClass(ColissimoTrackingTimelineApi::class)]
#[CoversClass(ColissimoTrackingTimelineRequest::class)]
#[CoversClass(Timeline::class)]
final class ColissimoTrackingTimelineApiTest extends TestCase
{
    use ClientTrait;

    public function testTimeline(): void
    {
        $client = $this->createClient(self::fixture('tracking_timeline.json'));

        $timeline = $client->send(new ColissimoTrackingTimelineRequest(Credential::apiKey('my-api-key'), '6C14140000002'));

        $this->assertInstanceOf(Timeline::class, $timeline);
        $this->assertTrue($timeline->isSuccess());
        $this->assertSame('6C14140000002', $timeline->parcel?->parcelNumber);
        $this->assertSame('PARIS', $timeline->parcel?->consigneeInformation?->address?->city);
        $this->assertCount(6, $timeline->parcel?->step ?? []);
        $this->assertCount(2, $timeline->parcel?->event ?? []);

        $this->assertSame(Step::PROCESSING, $timeline->getCurrentStep()?->stepId);
        $this->assertFalse($timeline->isDelivered());

        $lastEvent = $timeline->getLastEvent();
        $this->assertSame('PCHCFM', $lastEvent?->code);
        $this->assertSame('75000', $lastEvent?->siteZipCode);
        $this->assertSame('2019-04-05 09:09:00', $lastEvent?->getDate()?->format('Y-m-d H:i:s'));

        $this->assertNotNull($this->lastRequest);
        $this->assertSame('https://ws.colissimo.fr/tracking-timeline-ws/rest/tracking/timelineCompany', $this->lastRequest['url']);
        $this->assertSame(['apiKey' => 'my-api-key', 'parcelNumber' => '6C14140000002', 'lang' => 'fr_FR'], $this->lastRequest['options']['json']);
    }

    public function testLoginCredential(): void
    {
        $client = $this->createClient(self::fixture('tracking_timeline.json'));

        $client->send(new ColissimoTrackingTimelineRequest(Credential::login('900000', 'secret'), '6C14140000002', ColissimoTrackingTimelineRequest::LANG_EN));

        $this->assertNotNull($this->lastRequest);
        $this->assertSame(['login' => '900000', 'password' => 'secret', 'parcelNumber' => '6C14140000002', 'lang' => 'en_GB'], $this->lastRequest['options']['json']);
    }

    public function testUnknownParcel(): void
    {
        $client = $this->createClient(self::fixture('tracking_error.json'));

        try {
            $client->send(new ColissimoTrackingTimelineRequest(Credential::apiKey('key'), 'XX'));
            $this->fail('An exception should have been thrown');
        } catch (ColissimoResponseException $exception) {
            $this->assertSame(['105'], $exception->getErrorCodes());
        }
    }
}
