<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\EventSourceFactory;

use App\Calendar\Event\HolidayEvent;
use DateTime;
use DateTimeInterface;
use EzSystems\EzPlatformCalendar\Calendar\EventCollection;
use EzSystems\EzPlatformCalendar\Calendar\EventSource\EventSourceInterface;
use EzSystems\EzPlatformCalendar\Calendar\EventSource\InMemoryEventSource;
use EzSystems\EzPlatformCalendar\Calendar\EventType\EventTypeInterface;

final class HolidaysEventSourceFactory
{
    /** @var \App\Calendar\EventType\HolidayEventType */
    private $eventType;

    public function __construct(EventTypeInterface $eventType)
    {
        $this->eventType = $eventType;
    }

    public function createEventSource(): EventSourceInterface
    {
        $holidays = new EventCollection([
            $this->createEvent("Poniedziałek wielkanocny", new DateTime("2019-04-22")),
            $this->createEvent("1 maja", new DateTime("2019-05-01")),
            $this->createEvent("3 maja", new DateTime("2019-05-03")),
            $this->createEvent("Dzień matki", new DateTime("2019-05-26")),
        ]);

        return new InMemoryEventSource($holidays);
    }

    private function createEvent(string $id, DateTimeInterface $dateTime): HolidayEvent
    {
        return new HolidayEvent($id, $dateTime, $this->eventType);
    }
}
