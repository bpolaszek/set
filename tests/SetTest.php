<?php

declare(strict_types=1);

namespace Bentools\Set\Tests;

use Bentools\Set\Set;

use function Bentools\Set\set;
use function expect;

it('works', function (iterable $input, array $expected) {
    expect([...set($input)])->toBe($expected);
})->with(function () {
    yield 'scalars' => ['input' => ['foo', 'bar', 'foo', 'baz'], 'expected' => ['foo', 'bar', 'baz']];

    $foo = new \stdClass();
    $bar = new \stdClass();
    $baz = new \stdClass();

    yield 'objects' => ['input' => fn() => yield from [$foo, $bar, $foo, $baz], 'expected' => [$foo, $bar, $baz]];
});

it('accepts multiple arguments', function () {
    $set = (new Set(['banana', 'apple'], ['kiwi', 'apple']))
        ->with(['strawberry', 'banana'], ['pineapple', 'strawberry']);

    expect($set->toArray())->toBe([
        'banana',
        'apple',
        'kiwi',
        'strawberry',
        'pineapple',
    ]);
});

it('accepts a different accessor', function () {
    $set = (new Set(['banana', 'apple', 'BANANA']))->withAccessor('strtoupper');

    expect([...$set])->toBe(['banana', 'apple']);
});
