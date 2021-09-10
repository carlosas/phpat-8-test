<?php

namespace Infrastructure\Cli;

use Domain\Exception\NoInstructionsException;
use Application\Handler\ProcessInstructionsHandler;
use Application\Request\ProcessInstructionsRequest;
use Application\Exception\WrongHandlerException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessInstructionsCliCommand extends Command
{
    protected static $defaultName = 'machine:process';

    private ProcessInstructionsHandler $handler;

    public function __construct(ProcessInstructionsHandler $handler)
    {
        parent::__construct(self::$defaultName);
        $this->handler = $handler;
    }

    protected function configure()
    {
        $this->setDescription('Process a list of instructions');

        $this->addArgument(
                'instructions',
                InputArgument::IS_ARRAY,
                'List of instructions separated by ", "',
            )
        ;
    }

    /**
     * @throws WrongHandlerException
     * @throws NoInstructionsException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (empty($input->getArgument('instructions'))) {
            throw new NoInstructionsException();
        }

        $instructions = explode(', ', implode(' ', $input->getArgument('instructions')));

        $this->handler->handle(ProcessInstructionsRequest::create($instructions));

        return 0;
    }
}
