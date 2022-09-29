<?php

declare(strict_types=1);

namespace Bentools\Set;

/**
 * @template T
 * @param iterable<T> $items
 * @return Set<T>
 */
function set(iterable $items): Set
{
    return new Set($items);
}
