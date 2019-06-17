<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\EventType;

use App\Calendar\EventAction\RescheduleAction;
use EzSystems\EzPlatformCalendar\Calendar\Event;
use EzSystems\EzPlatformCalendar\Calendar\EventAction\EventActionCollection;
use EzSystems\EzPlatformCalendar\Calendar\EventType\EventTypeInterface;

final class PrivateEventType implements EventTypeInterface
{
    private const EVENT_TYPE_IDENTIFIER = 'private';

    public function getTypeIdentifier(): string
    {
        return self::EVENT_TYPE_IDENTIFIER;
    }

    public function getTypeLabel(): string
    {
        return 'Prywatne';
    }

    public function getEventName(Event $event): string
    {
        return $event->getId();
    }

    public function getActions(): EventActionCollection
    {
        return new EventActionCollection([
            new RescheduleAction(),
        ]);
    }
}
