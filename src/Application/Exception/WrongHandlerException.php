<?php

namespace Application\Exception;

class WrongHandlerException extends \Exception
{
    public function __construct(string $requestName, string $handlerName)
    {
        parent::__construct('The request ' . $requestName . ' can not be handled by ' . $handlerName);
    }
}
