<?php

namespace Application\Response;

use Application\Response\CommandResponseInterface;

class ProcessInstructionsResponse implements CommandResponseInterface
{
    public static function create(): self
    {
        return new self();
    }
}
