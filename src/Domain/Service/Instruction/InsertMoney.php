<?php

namespace Domain\Service\Instruction;

use Domain\VendingMachine;

class InsertMoney implements Instruction
{
    private int $cents;

    public function __construct(int $cents)
    {
        $this->cents = $cents;
    }

    public function execute(VendingMachine $machine): void
    {
        $machine->insertMoney($this->cents);
    }
}
