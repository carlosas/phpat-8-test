<?php

namespace Application\EventListener;

use Domain\Event\ItemBoughtEvent;

class ItemBoughtListener
{
    public function onEvent(ItemBoughtEvent $event): void
    {
        echo $event->getName() . PHP_EOL;
    }
}
