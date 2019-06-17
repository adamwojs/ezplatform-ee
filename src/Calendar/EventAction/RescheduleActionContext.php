<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\EventAction;

use EzSystems\EzPlatformCalendar\Calendar\EventAction\EventActionContext;
use EzSystems\EzPlatformCalendar\Calendar\EventCollection;

final class RescheduleActionContext extends EventActionContext
{
    /** @var \DateTimeInterface */
    private $dateTime;

    public function __construct(EventCollection $events, \DateTimeInterface $dateTime)
    {
        parent::__construct($events);

        $this->dateTime = $dateTime;
    }

    public function getDateTime(): \DateTimeInterface
    {
        return $this->dateTime;
    }
}
