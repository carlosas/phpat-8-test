<?php

namespace Application\Handler;

use Application\Request\CommandRequestInterface;
use Application\Response\CommandResponseInterface;

interface HandlerInterface
{
    public function handle(CommandRequestInterface $request): CommandResponseInterface;
}
