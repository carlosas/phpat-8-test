<?php

namespace Domain\Service\Instruction;

use Domain\VendingMachine;

interface Instruction
{
    public function execute(VendingMachine $machine): void;
}
