<?php

namespace Application\Request;

use Application\Request\CommandRequestInterface;

class ProcessInstructionsRequest implements CommandRequestInterface
{
    private array $instructions;

    final private function __construct(array $instructions)
    {
        $this->instructions = $instructions;
    }

    public static function create(array $instructions): self
    {
        return new static($instructions);
    }

    public function getInstructions(): array
    {
        return $this->instructions;
    }
}
