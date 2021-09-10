<?php

namespace Application\Handler;

use Application\Request\ProcessInstructionsRequest;
use Application\Response\ProcessInstructionsResponse;
use Application\Service\InstructionFactory;
use Domain\VendingMachine;
use Application\Exception\WrongHandlerException;
use Application\Handler\HandlerInterface;
use Application\Request\CommandRequestInterface;
use Application\Response\CommandResponseInterface;

class ProcessInstructionsHandler implements HandlerInterface
{
    private VendingMachine $machine;

    public function __construct(VendingMachine $machine)
    {
        $this->machine = $machine;
    }

    /**
     * @throws WrongHandlerException
     */
    public function handle(CommandRequestInterface $request): CommandResponseInterface
    {
        if (!($request instanceof ProcessInstructionsRequest)) {
            throw new WrongHandlerException(get_class($request), self::class);
        }

        foreach ($request->getInstructions() as $instruction) {
            (InstructionFactory::create($instruction))->execute($this->machine);
        }

        return ProcessInstructionsResponse::create();
    }
}
