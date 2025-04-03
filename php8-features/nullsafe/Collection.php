<?php

namespace App\NullSafe;

class Collection implements \ArrayAccess
{
    private array $items = ['name' => 'Alice'];

    public function offsetExists(mixed $offset): bool {
        return isset($this->items[$offset]);
    }

    public function offsetGet(mixed $offset): mixed {
        return $this->items[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void {
        $this->items[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void {
        unset($this->items[$offset]);
    }
}