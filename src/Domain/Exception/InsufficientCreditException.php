<?php

namespace Domain\Exception;

class InsufficientCreditException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Insufficient credit');
    }
}
