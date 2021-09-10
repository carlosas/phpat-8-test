<?php

namespace Domain\Exception;

class ItemNotFoundException extends \RuntimeException
{
    public function __construct(string $item)
    {
        parent::__construct('The item ' . $item . ' does not exist');
    }
}
