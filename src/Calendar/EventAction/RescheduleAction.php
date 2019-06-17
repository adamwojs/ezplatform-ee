<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\EventAction;

use EzSystems\EzPlatformCalendar\Calendar\Event;
use EzSystems\EzPlatformCalendar\Calendar\EventAction\EventActionContext;
use EzSystems\EzPlatformCalendar\Calendar\EventAction\EventActionInterface;
use InvalidArgumentException;

final class RescheduleAction implements EventActionInterface
{
    public function execute(EventActionContext $context): void
    {
        if (!($context instanceof RescheduleActionContext)) {
            throw new InvalidArgumentException("Expected RescheduleActionContext");
        }

        echo $this->getSuccessMessage($context);
    }

    public function getActionIdentifier(): string
    {
        return 'reschedule';
    }

    public function getActionLabel(): string
    {
        return 'Reschedule action';
    }

    private function getSuccessMessage(RescheduleActionContext $context): string
    {
        $names = $context->getEvents()->map(function (Event $event) {
            return $event->getName();
        });

        return sprintf(
            "Rescheduling events %s to %s",
            implode(', ', $names),
            $context->getDateTime()->format("Y-m-d H:i")
        );
    }
}
