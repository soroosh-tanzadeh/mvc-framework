<?php

namespace App\Core\Utilities;

use InvalidArgumentException;

class ObjectArrayFactory
{
    /**
     * @param string $type
     * @param iterable $objects
     * @return ObjectArray
     * @throws InvalidArgumentException
     */
    public function create(string $type, iterable $objects = []): ObjectArray
    {
        return new ObjectArray($type, $objects);
    }
}
