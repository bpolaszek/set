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
     * @var array<iterable<T>>
     */
    private array $iterables;

    /**
     * @param iterable<T> $items
     * @param iterable<T> ...$otherIterables
     */
    public function __construct(iterable $items, iterable ...$otherIterables)
    {
        $this->iterables = [$items, ...$otherIterables];
    }

    /**
     * @param iterable<T> $items
     * @param iterable<T> ...$otherIterables
     * @return self<T>
     */
    public function with(iterable $items, iterable ...$otherIterables): self
    {
        $clone = clone $this;
        $clone->iterables = [...$clone->iterables, $items, ...$otherIterables];

        return $clone;
    }

    /**
     * @return Traversable<T>
     */
    public function getIterator(): Traversable
    {
        $yielded = [];
        foreach ($this->iterables as $iterable) {
            foreach ($iterable as $key => $item) {
                if (!in_array($item, $yielded, true)) {
                    yield $key => $item;
                    $yielded[] = $item;
                }
            }
        }
    }

    /**
     * @return array<T>
     */
    public function toArray(): array
    {
        return [...$this];
    }
}
