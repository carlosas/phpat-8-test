<?php

namespace Domain\Service\Instruction;

use Domain\VendingMachine;

class ReturnCoin implements Instruction
{
    public function execute(VendingMachine $machine): void
    {
        $machine->returnCoins();
    }
}
