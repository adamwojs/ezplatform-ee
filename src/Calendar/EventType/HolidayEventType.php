<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Calendar\EventType;

use EzSystems\EzPlatformCalendar\Calendar\Event;
use EzSystems\EzPlatformCalendar\Calendar\EventAction\EventActionCollection;
use EzSystems\EzPlatformCalendar\Calendar\EventType\EventTypeInterface;
use Symfony\Component\Translation\TranslatorInterface;

final class HolidayEventType implements EventTypeInterface
{
    private const EVENT_TYPE_IDENTIFIER = 'holiday';

    /** @var \Symfony\Contracts\Translation\TranslatorInterface */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getTypeIdentifier(): string
    {
        return self::EVENT_TYPE_IDENTIFIER;
    }

    public function getTypeLabel(): string
    {
        return 'National holiday';
    }

    public function getEventName(Event $event): string
    {
        return $this->translator->trans($event->getId(), [], 'holidays');
    }

    public function getActions(): EventActionCollection
    {
        return EventActionCollection::createEmpty();
    }
}
