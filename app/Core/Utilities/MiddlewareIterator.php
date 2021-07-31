<?php

namespace App\Core\Utilities;

use App\Core\Http\Middleware;
use ArrayIterator;
use Countable;
use InvalidArgumentException;
use Iterator;
use function get_class;


class MiddlewareIterator implements Countable, Iterator
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var ArrayIterator
     */
    private ArrayIterator $iterator;

    /**
     * MiddlewareIterator constructor.
     * @param string $type
     * @param iterable|ArrayIterator $objects
     * @throws InvalidArgumentException
     */
    public function __construct($objects = [])
    {
        $this->type = Middleware::class;
        if ($objects instanceof ArrayIterator) {
            $this->iterator = $objects;
        } elseif ($objects instanceof iterable) {
            $this->iterator = new ArrayIterator();
            foreach ($objects as $key => $object) {
                $this->offsetSet($key, $object);
            }
        }
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->iterator->count();
    }

    /**
     * @return mixed
     */
    public function current(): Middleware
    {
        return $this->iterator->current();
    }

    /**
     * @return void
     */
    public function next(): void
    {
        $this->iterator->next();
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return $this->iterator->key();
    }


    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->iterator->valid();
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->iterator->rewind();
    }

    /**
     * @param $object
     * @return void
     * @throws InvalidArgumentException
     */
    private function validateObjectType($object): void
    {
        if (!$object instanceof $this->type) {
            throw new InvalidArgumentException(
                sprintf(
                    'Object of invalid class passed. Expected: %s. Actual: %s',
                    $this->type,
                    get_class($object)
                )
            );
        }
    }
}
