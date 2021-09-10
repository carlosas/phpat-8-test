<?php

namespace Application\EventListener;

use Domain\Event\ServiceRequestedEvent;

class ServiceRequestedListener
{
    public function onEvent(ServiceRequestedEvent $event): void
    {
        $items = implode(', ', $event->getAvailableItems());
        $coins = implode(
            ', ',
            array_map(function($obj){ return $obj / 100; }, $event->getAvailableCoins() ?? [])
        );
        echo 'items: ' .  $items . ' . change: ' . $coins . PHP_EOL;
    }
}
