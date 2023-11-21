<?php

declare(strict_types=1);

namespace Bentools\Set;

use Closure;
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

    private Closure $accessor;

    /**
     * @param iterable<T> $items
     * @param iterable<T> ...$otherIterables
     */
    public function __construct(iterable $items, iterable ...$otherIterables)
    {
        $this->iterables = [$items, ...$otherIterables];
        $this->accessor = static fn ($item) => $item;
    }

    /**
     * @return self<T>
     */
    public function withAccessor(callable $accessor): self
    {
        if (!$accessor instanceof Closure) {
            $accessor = Closure::fromCallable($accessor);
        }

        $clone = clone $this;
        $clone->accessor = $accessor;

        return $clone;
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
                $unique = ($this->accessor)($item);
                if (!in_array($unique, $yielded, true)) {
                    yield $key => $item;
                    $yielded[] = $unique;
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
