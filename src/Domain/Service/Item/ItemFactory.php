<?php

namespace Domain\Service;

use Domain\Exception\ItemNotFoundException;
use Domain\ValueObject\Item\Item;

class ItemFactory
{
    private const ITEMS = [
        'WATER' => 65,
        'JUICE' => 100,
        'SODA' => 150
    ];

    public static function fromName(string $name): Item
    {
        $name = strtoupper($name);

        if (!in_array($name, array_keys(self::ITEMS))) {
            throw new ItemNotFoundException($name);
        }

        return new Item($name, self::ITEMS[$name]);
    }
}
