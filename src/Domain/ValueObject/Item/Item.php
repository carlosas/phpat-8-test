<?php

namespace Domain\ValueObject\Item;

class Item
{
    private string $name;
    private int    $priceInCents;

    public function __construct(string $name, int $priceInCents)
    {
        $this->name = $name;
        $this->priceInCents = $priceInCents;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPriceInCents(): int
    {
        return $this->priceInCents;
    }
}
