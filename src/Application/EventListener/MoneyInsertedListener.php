<?php

namespace Application\EventListener;

use Domain\Event\MoneyInsertedEvent;

class MoneyInsertedListener
{
    public function onEvent(MoneyInsertedEvent $event): void
    {

    }
}
