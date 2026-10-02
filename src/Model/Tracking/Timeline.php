<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Tracking;

/**
 * Response of the Timeline tracking web service (timelineCompany).
 */
final class Timeline
{
    public ?string $lang = null;

    /** @var list<TimelineStatus> */
    public array $status = [];

    public ?TrackedParcel $parcel = null;

    public function isSuccess(): bool
    {
        foreach ($this->status as $status) {
            if (!$status->isSuccess()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return list<Event> events sorted from the most recent to the oldest
     */
    public function getEvents(): array
    {
        $events = $this->parcel->event ?? [];

        usort($events, static fn (Event $a, Event $b): int => ($b->getDateTime()?->getTimestamp() ?? 0) <=> ($a->getDateTime()?->getTimestamp() ?? 0));

        return $events;
    }

    public function getLastEvent(): ?Event
    {
        return $this->getEvents()[0] ?? null;
    }

    /**
     * Most advanced active step of the timeline (0: announcement ... 5: delivered).
     */
    public function getCurrentStep(): ?Step
    {
        $current = null;

        foreach ($this->parcel->step ?? [] as $step) {
            if ($step->isActive() && (null === $current || $step->stepId > $current->stepId)) {
                $current = $step;
            }
        }

        return $current;
    }

    public function isDelivered(): bool
    {
        return Step::DELIVERED === $this->getCurrentStep()?->stepId;
    }
}
