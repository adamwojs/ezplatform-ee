<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\Event;

use App\Calendar\EventType\HolidayEventType;
use DateTimeInterface;
use EzSystems\EzPlatformCalendar\Calendar\Event;

final class HolidayEvent extends Event
{
    public function __construct(string $id, DateTimeInterface $dateTime, HolidayEventType $type)
    {
        parent::__construct($type, $id, $dateTime);
    }
}
