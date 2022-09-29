<?php

declare(strict_types=1);

namespace Bentools\Set;

use IteratorAggregate;
use Traversable;

use function in_array;

/**
 * @template T
 * @implements IteratorAggregate<T>
 */
final class Set implements IteratorAggregate
{
    /**
     * @var iterable<T>
     */
    private iterable $items;

    /**
     * @param iterable<T> $items
     */
    public function __construct(iterable $items)
    {
        $this->items = $items;
    }

    /**
     * @return Traversable<T>
     */
    public function getIterator(): Traversable
    {
        $yielded = [];
        foreach ($this->items as $key => $item) {
            if (!in_array($item, $yielded, true)) {
                yield $key => $item;
                $yielded[] = $item;
            }
        }
    }
}
