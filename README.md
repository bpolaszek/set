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
