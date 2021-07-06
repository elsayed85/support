<?php

namespace Helldar\Support\Helpers\Ables;

use Helldar\Support\Facades\Helpers\Arr;

class Arrayable
{
    protected $value;

    public function __construct($value = [])
    {
        $this->value = Arr::wrap($value);
    }

    /**
     * Creates the current object in case of accessing the Arrayable through the facade.
     *
     * @param  array|\ArrayAccess|string|null  $value
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function of($value = []): self
    {
        return new self($value);
    }

    /**
     * Returns the final array.
     *
     * @return array
     */
    public function get(): array
    {
        return $this->value ?: [];
    }

    /**
     * Renaming array keys.
     * As the second parameter, a callback function is passed, which determines the actions for processing the value.
     * The output of the function must be a string with a name.
     *
     * @param  callable  $callback
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function renameKeys(callable $callback): self
    {
        return new self(Arr::renameKeys($this->value, $callback));
    }

    /**
     * Renaming array keys with map.
     *
     * @param  array  $map
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function renameKeysMap(array $map): self
    {
        return new self(Arr::renameKeysMap($this->value, $map));
    }

    /**
     * Push one a unique element onto the end of array.
     *
     * @param  mixed  $values
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function addUnique($values): self
    {
        return new self(Arr::addUnique($this->value, $values));
    }

    /**
     * Removes duplicate values from an array.
     *
     * Sorting type flags:
     *   SORT_REGULAR       - compare items normally
     *   SORT_NUMERIC       - compare items numerically
     *   SORT_STRING        - compare items as strings
     *   SORT_LOCALE_STRING - compare items as strings, based on the current locale
     *
     * @see https://php.net/manual/en/function.array-unique.php
     *
     * @param  int  $flags
     *
     * @return $this
     */
    public function unique(int $flags = SORT_STRING): self
    {
        return new self(Arr::unique($this->value, $flags));
    }

    /**
     * Sort an associative array in the order specified by an array of keys.
     *
     * Example:
     *
     *  $arr = ['q' => 1, 'r' => 2, 's' => 5, 'w' => 123];
     *
     *  Arr::sortByKeys($arr, ['q', 'w', 'e']);
     *
     * print_r($arr);
     *
     *   Array
     *   (
     *     [q] => 1
     *     [w] => 123
     *     [r] => 2
     *     [s] => 5
     *   )
     *
     * @see https://gist.github.com/Ellrion/a3145621f936aa9416f4c04987533d8d#file-helper-php
     *
     * @param  array  $sorter
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function sortByKeys(array $sorter): self
    {
        return new self(Arr::sortByKeys($this->value, $sorter));
    }

    /**
     * Recursively sorting an array by values.
     *
     * @param  callable|null  $callback
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function sort(callable $callback = null): self
    {
        return new self(Arr::sort($this->value, $callback));
    }

    /**
     * Recursively sorting an array by keys.
     *
     * @param  callable|null  $callback
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function ksort(callable $callback = null): self
    {
        return new self(Arr::ksort($this->value, $callback));
    }

    /**
     * Merge one or more arrays recursively.
     * Don't forget that numeric keys NOT will be renumbered!
     *
     * @param  array  ...$arrays
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function merge(...$arrays): self
    {
        return new self(Arr::merge($this->value, ...$arrays));
    }

    /**
     * Get the instance as an array.
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function toArray(): self
    {
        return new self(Arr::toArray($this->value));
    }

    /**
     * Get all of the given array except for a specified array of keys.
     *
     * @param  array|callable|string  $keys
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function except($keys): self
    {
        return new self(Arr::except($this->value, $keys));
    }

    /**
     * Get a subset of the items from the given array.
     *
     * @param  array|callable|string  $keys
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function only($keys): self
    {
        return new self(Arr::only($this->value, $keys));
    }

    /**
     * Iterates over each value in the <b>array</b> passing them to the <b>callback</b> function.
     * If the <b>callback</b> function returns true, the current value from <b>array</b> is returned into
     * the result array. Array keys are preserved.
     *
     * @see https://php.net/manual/en/function.array-filter.php
     *
     * @param  callable|null  $callback
     * @param  int  $mode
     *
     * @return $this
     */
    public function filter(callable $callback = null, int $mode = 0): self
    {
        return new self(Arr::filter($this->value, $callback, $mode));
    }

    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  bool  $ignore_keys
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function flatten(bool $ignore_keys = true): self
    {
        return new self(Arr::flatten($this->value, $ignore_keys));
    }

    /**
     * Applies the callback to the elements of the given arrays.
     *
     * @param  callable  $callback
     * @param  bool  $recursive
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function map(callable $callback, bool $recursive = false): self
    {
        return new self(Arr::map($this->value, $callback, $recursive));
    }

    /**
     * Exchanges all keys with their associated values in an array.
     *
     * @see  https://php.net/manual/en/function.array-flip.php
     *
     * @return $this
     */
    public function flip(): self
    {
        return new self(Arr::flip($this->value));
    }

    /**
     * Return all the keys or a subset of the keys of an array.
     *
     * @see https://php.net/manual/en/function.array-keys.php
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function keys(): self
    {
        return new self(Arr::keys($this->value));
    }

    /**
     * Return all the values of an array.
     *
     * @see  https://php.net/manual/en/function.array-values.php
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function values(): self
    {
        return new self(Arr::values($this->value));
    }

    /**
     * Push elements onto the end of array.
     *
     * @see  https://php.net/manual/en/function.array-push.php
     *
     * @param  mixed  ...$values
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function push(...$values): self
    {
        return new self(Arr::push($this->value, ...$values));
    }

    /**
     * Assigns a value to an array key.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function set($key, $value = null): self
    {
        return new self(Arr::set($this->value, $key, $value));
    }

    /**
     * Removes an array key.
     *
     * @param  mixed  $key
     *
     * @return \Helldar\Support\Helpers\Ables\Arrayable
     */
    public function remove($key): self
    {
        return new self(Arr::remove($this->value, $key));
    }

    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  callable  $callback
     *
     * @return $this
     */
    public function tap(callable $callback): self
    {
        return new self(Arr::tap($this->value, $callback));
    }

    /**
     * Outputs the contents of a variable without terminating the application.
     *
     * @return $this
     */
    public function dump(): self
    {
        dump($this->value);

        return $this;
    }

    /**
     * Outputs the contents of a variable, terminating the application.
     */
    public function dd(): void
    {
        dd($this->value);
    }
}
