<?php

namespace Domain\Exception;

class NoInstructionsException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('You need to provide at least one instruction');
    }
}
