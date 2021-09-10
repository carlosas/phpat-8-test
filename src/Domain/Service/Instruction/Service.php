<?php

namespace Domain\Service\Instruction;

use Domain\VendingMachine;

class Service implements Instruction
{
    public function execute(VendingMachine $machine): void
    {
        $machine->service();
    }
}
