<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\EventSourceFactory;

use App\Calendar\Event\PrivateEvent;
use App\Calendar\EventType\PrivateEventType;
use DateTime;
use DateTimeInterface;
use EzSystems\EzPlatformCalendar\Calendar\EventCollection;
use EzSystems\EzPlatformCalendar\Calendar\EventSource\EventSourceInterface;
use EzSystems\EzPlatformCalendar\Calendar\EventSource\InMemoryEventSource;

final class PrivateEventsSourceFactory
{
    /** @var \App\Calendar\EventType\PrivateEventType */
    private $eventType;

    public function __construct(PrivateEventType $eventType)
    {
        $this->eventType = $eventType;
    }

    public function createEventSource(): EventSourceInterface
    {
        $holidays = new EventCollection([
            $this->createEvent("Urlop I", new DateTime("2019-04-23")),
            $this->createEvent("Urlop II", new DateTime("2019-04-24")),
            $this->createEvent("Urlop III", new DateTime("2019-04-25")),
            $this->createEvent("Ślub Piotr & Karolina", new DateTime("2019-05-18")),
            $this->createEvent("Urodziny", new DateTime("2019-05-03")),
            $this->createEvent("Symfony Live 2019", new DateTime("2019-06-13")),
            $this->createEvent("Symfony Live 2019", new DateTime("2019-06-14")),
            $this->createEvent("Urlop V", new DateTime("2019-06-21")),
        ]);

        return new InMemoryEventSource($holidays);
    }

    private function createEvent(string $id, DateTimeInterface $dateTime): PrivateEvent
    {
        return new PrivateEvent($id, $dateTime, $this->eventType);
    }
}
