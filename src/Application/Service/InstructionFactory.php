<?php

namespace Application\Service;

use Domain\Exception\InstructionNotFoundException;
use Domain\Service\Instruction\InsertMoney;
use Domain\Service\Instruction\Instruction;
use Domain\Service\Instruction\ReturnCoin;
use Domain\Service\Instruction\SelectItem;
use Domain\Service\Instruction\Service;

class InstructionFactory
{
    /**
     * @throws InstructionNotFoundException
     */
    public static function create(string $instruction): Instruction
    {
        switch (true)
        {
            case (is_numeric($instruction)):
                return new InsertMoney(intval(round((float)$instruction, 2) * 100));
            case (substr($instruction, 0, 4 ) === "GET-"):
                return new SelectItem(substr($instruction, 4));
            case ($instruction === 'RETURN-COIN'):
                return new ReturnCoin();
            case ($instruction === 'SERVICE'):
                return new Service();
            default:
                throw new InstructionNotFoundException($instruction);
        }
    }
}
