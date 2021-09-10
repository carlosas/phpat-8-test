<?php

namespace Domain\Event;

class ServiceRequestedEvent
{
    private array $availableItems;
    private array $availableCoins;

    private function __construct(array $availableItems, array $availableCoins)
    {
        $this->availableItems = $availableItems;
        $this->availableCoins = $availableCoins;
    }

    public static function create(array $availableItems, array $availableCoins): self
    {
        return new self($availableItems, $availableCoins);
    }

    public function getAvailableItems(): array
    {
        return $this->availableItems;
    }

    public function getAvailableCoins(): array
    {
        return $this->availableCoins;
    }
}
