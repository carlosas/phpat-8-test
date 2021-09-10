<?php

namespace Domain\Exception;

class InstructionNotFoundException extends \RuntimeException
{
    public function __construct(string $instruction)
    {
        parent::__construct('Unable to resolve the instruction ' . $instruction);
    }
}
