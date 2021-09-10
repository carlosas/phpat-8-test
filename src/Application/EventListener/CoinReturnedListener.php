<?php

namespace Application\EventListener;

use Domain\Event\CoinReturnedEvent;

class CoinReturnedListener
{
    public function onEvent(CoinReturnedEvent $event): void
    {
        echo $event->getAmount() / 100 . PHP_EOL;
    }
}
