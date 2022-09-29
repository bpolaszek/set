<?php

declare(strict_types=1);

namespace Bentools\Set\Tests;

use function Bentools\Set\set;

it('works', function (iterable $input, array $expected) {
    expect([...set($input)])->toBe($expected);
})->with(function () {
    yield 'scalars' => ['input' => ['foo', 'bar', 'foo', 'baz'], 'expected' => ['foo', 'bar', 'baz']];

    $foo = new \stdClass();
    $bar = new \stdClass();
    $baz = new \stdClass();

    yield 'objects' => ['input' => fn() => yield from [$foo, $bar, $foo, $baz], 'expected' => [$foo, $bar, $baz]];
});
