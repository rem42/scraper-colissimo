<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Api;

use Scraper\ScraperColissimo\Exception\ColissimoResponseException;
use Scraper\ScraperColissimo\Factory\SerializerFactory;
use Scraper\ScraperColissimo\Model\Message;
use Scraper\ScraperColissimo\Model\Tracking\Timeline;
use Scraper\ScraperColissimo\Model\Tracking\TimelineStatus;

final class ColissimoTrackingTimelineApi extends ColissimoApi
{
    public function execute(): Timeline
    {
        $statusCode = $this->getStatusCode();
        $data = $this->decodeJson($this->getContent());

        /** @var Timeline $timeline */
        $timeline = SerializerFactory::getShared()->denormalize($data, Timeline::class, 'json', SerializerFactory::RESPONSE_CONTEXT);

        if (!$timeline->isSuccess() || $statusCode < 200 || $statusCode >= 300) {
            $messages = array_values(array_map(
                static fn (TimelineStatus $status): Message => new Message($status->code, Message::TYPE_ERROR, $status->message ?? ''),
                array_filter($timeline->status, static fn (TimelineStatus $status): bool => !$status->isSuccess()),
            ));

            throw new ColissimoResponseException('Colissimo tracking error', $messages, $statusCode);
        }

        return $timeline;
    }
}
