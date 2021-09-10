<?php

namespace Domain;

use Domain\Exception\InsufficientCreditException;
use Domain\Exception\UnavailableItemException;
use Domain\Event\CoinReturnedEvent;
use Domain\Event\ItemBoughtEvent;
use Domain\Event\MoneyInsertedEvent;
use Domain\Event\ServiceRequestedEvent;
use Domain\ValueObject\Item\Item;
use Psr\EventDispatcher\EventDispatcherInterface;

class VendingMachine
{
    private EventDispatcherInterface $eventDispatcher;
    private array                    $currentInsertedMoney;
    private array                    $availableChange;
    private array                    $availableItems;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->currentInsertedMoney = [];
        $this->availableChange = [10, 100, 100, 25];
        $this->availableItems = ['SODA', 'SODA', 'WATER', 'JUICE'];
    }

    public function insertMoney(int $cents): void
    {
        $this->currentInsertedMoney[] = $cents;
        $this->availableChange[] = $cents;

        $this->eventDispatcher->dispatch(MoneyInsertedEvent::create($cents));
    }

    public function returnCoins(): void
    {
        $toReturn = $this->currentInsertedMoney;

        foreach($toReturn as $coin) {
            if(($key = array_search($coin, $this->availableChange)) !== false) {
                unset($this->availableChange[$key]);

                $this->eventDispatcher->dispatch(CoinReturnedEvent::create($coin));
            }
        }

        $this->currentInsertedMoney = [];
    }

    public function buyItem(Item $item): void
    {
        if(($key = array_search($item->getName(), $this->availableItems)) !== false) {
            $this->chargeItemPrice($item);
            unset($this->availableItems[$key]);

            $this->eventDispatcher->dispatch(ItemBoughtEvent::create($item->getName()));

            $this->returnCoins();

            return;
        }

        throw new UnavailableItemException($item->getName());
    }

    public function service(): void
    {
        $this->eventDispatcher->dispatch(ServiceRequestedEvent::create($this->availableItems, $this->availableChange));
    }

    private function chargeItemPrice(Item $item): void
    {
        if (array_sum($this->currentInsertedMoney) < $item->getPriceInCents()) {
            throw new InsufficientCreditException();
        }

        rsort($this->currentInsertedMoney);
        $toCharge = $item->getPriceInCents();
        foreach ($this->currentInsertedMoney as $k => $coin) {
            if ($coin <= $toCharge) {
                $toCharge -= $coin;
                unset($this->currentInsertedMoney[$k]);
            }
        }
    }
}
