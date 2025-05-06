<?php

namespace Rekuital\BitrixComponentParameters\Internal;

use ArrayAccess;
use Countable;
use InvalidArgumentException;
use Iterator;

/**
 * @template TKey
 * @template-covariant TValue
 * @implements Iterator<TKey, TValue>
 * @implements ArrayAccess<TKey, TValue>
 */
abstract class Collection implements Countable, ArrayAccess, Iterator
{
    /** @var TValue[] */
    protected array $items = [];

    /** @var class-string<TValue>[] */
    protected array $types = [];

    /**
     * @param class-string<TValue>|class-string<TValue>[] $type
     * @param TValue[] $items
     */
    public function __construct(string|array $type, array $items = [])
    {
        $this->types = is_array($type) ? $type : [$type];

        foreach ($items as $key => $item) {
            if (!$this->isValidInstanceItem($item)) {
                throw new InvalidArgumentException(
                    'parameter value with index ' . $key . ' is not ' . implode(' or ', $this->getClassForItem()),
                );
            }
        }

        $this->items = $items;
    }

    /**
     * @return TValue|null
     */
    public function current(): mixed
    {
        return current($this->items) ?: null;
    }

    public function next(): void
    {
        next($this->items);
    }

    public function key(): int|string|null
    {
        return key($this->items);
    }

    public function valid(): bool
    {
        return ($this->key() !== null);
    }

    public function rewind(): void
    {
        reset($this->items);
    }

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * @param mixed $offset
     *
     * @return TValue|null
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset] ?? null;
    }

    /**
     * @param TValue $value
     *
     * @throws InvalidArgumentException
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$this->isValidInstanceItem($value)) {
            throw new InvalidArgumentException(
                'parameter value is not ' . implode(' or ', $this->getClassForItem()),
            );
        }

        if ($offset === null) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /** @noinspection PhpUnused */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    public function count(): int
    {
        return count($this->items);
    }

    protected function isValidInstanceItem($item): bool
    {
        $isValid = false;
        foreach ($this->getClassForItem() as $className) {
            $isValid |= $item instanceof $className;
        }

        return $isValid;
    }

    /**
     * @return class-string<TValue>[]
     */
    protected function getClassForItem(): array
    {
        return $this->types;
    }
}
