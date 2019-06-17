<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\Event;

use App\Calendar\EventAction\RescheduleAction;
use App\Calendar\EventAction\RescheduleActionContext;
use App\Calendar\EventType\PrivateEventType;
use DateTimeInterface;
use EzSystems\EzPlatformCalendar\Calendar\Event;
use EzSystems\EzPlatformCalendar\Calendar\EventCollection;

final class PrivateEvent extends Event
{
    /** @var string */
    private $label;

    public function __construct(string $id, DateTimeInterface $dateTime, PrivateEventType $type, string $label = '')
    {
        parent::__construct($type, $id, $dateTime);
        $this->label = $label;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function reschedule(DateTimeInterface $when): void
    {
        $this->executeAction(RescheduleAction::class, new RescheduleActionContext(EventCollection::of($this), $when));
    }

    public function unschedule(): void
    {
        //$action = $this->getType()->getActions()->get('unchedule');
        //$action->execute(new UnscheduleActionContext(EventCollection::of($this), $when));
    }
}
