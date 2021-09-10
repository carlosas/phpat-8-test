<?php

namespace Domain\Event;

class MoneyInsertedEvent
{
    private int $cents;

    public function __construct(int $cents)
    {
        $this->cents = $cents;
    }

    public static function create(int $cents): self
    {
        return new self($cents);
    }

    public function getAmount(): int
    {
        return $this->cents;
    }
}
