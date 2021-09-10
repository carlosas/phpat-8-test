<?php

namespace Domain\Service\Instruction;

use Domain\Service\ItemFactory;
use Domain\VendingMachine;

class SelectItem implements Instruction
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function execute(VendingMachine $machine): void
    {
        $machine->buyItem(ItemFactory::fromName($this->name));
    }
}
