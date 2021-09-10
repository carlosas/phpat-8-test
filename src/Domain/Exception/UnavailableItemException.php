<?php

namespace Domain\Exception;

class UnavailableItemException extends \RuntimeException
{
    public function __construct(string $item)
    {
        parent::__construct('Item ' . $item . ' unavailable');
    }
}
