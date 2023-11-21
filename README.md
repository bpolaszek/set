[![Latest Stable Version](https://poser.pugx.org/bentools/set/v/stable)](https://packagist.org/packages/bentools/set)
[![License](https://poser.pugx.org/bentools/set/license)](https://packagist.org/packages/bentools/set)
[![CI Workflow](https://github.com/bpolaszek/set/actions/workflows/ci.yml/badge.svg)](https://github.com/bpolaszek/set/actions/workflows/ci.yml)
[![Coverage](https://codecov.io/gh/bpolaszek/set/branch/main/graph/badge.svg?token=L5ulTaymbt)](https://codecov.io/gh/bpolaszek/set)
[![Total Downloads](https://poser.pugx.org/bentools/set/downloads)](https://packagist.org/packages/bentools/set)

# bentools/set

Javascript has a convenient way of deduplicating arrays:

```js
const items = ['foo', 'bar', 'foo', 'baz'];
console.log([...new Set(items)]); // ['foo', 'bar', 'baz']
```

So why not PHP?

```php
use Bentools\Set\Set;

$items = ['foo', 'bar', 'foo', 'baz'];
var_dump([...new Set($items)]); // ['foo', 'bar', 'baz']
```

Shorthand:

```php
use function Bentools\Set\set;

$items = ['foo', 'bar', 'foo', 'baz'];
var_dump([...set($items)]); // ['foo', 'bar', 'baz']
```

## Installation

```bash
composer require bentools/set
```

## Tests

```bash
composer test
```

## License
MIT.
