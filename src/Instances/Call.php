<?php

/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

namespace DragonCode\Support\Instances;

use Closure;
use DragonCode\Support\Facades\Helpers\Arr as ArrHelper;
use DragonCode\Support\Facades\Instances\Instance as InstanceHelper;
use DragonCode\Support\Facades\Instances\Reflection as ReflectionHelper;
use DragonCode\Support\Facades\Types\Is as IsHelper;
use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;

class Call
{
    /**
     * Gets the result of executing code in the specified class.
     *
     * @param object|callable|string $class
     * @param string $method
     * @param mixed ...$parameters
     *
     * @throws ReflectionException
     *
     * @return mixed
     */
    public function run(object|callable|string $class, string $method, mixed ...$parameters): mixed
    {
        $this->validate($class);

        if ($value = $this->callback($class, $method, ...$parameters)) {
            return $value;
        }

        $reflect = $this->reflection($class)->getMethod($method);

        if (! $reflect->isStatic() && ! InstanceHelper::of($class, Closure::class)) {
            $class = $this->resolve($class);
        }

        return call_user_func([$class, $method], ...$parameters);
    }

    /**
     * Gets the result of executing code in the specified class if method exist.
     *
     * @param object|callable|string $class
     * @param string $method
     * @param mixed ...$parameters
     *
     * @throws ReflectionException
     *
     * @return mixed
     */
    public function runExists(object|callable|string $class, string $method, mixed ...$parameters): mixed
    {
        $this->validate($class);

        if ($value = $this->callback($class, $method, ...$parameters)) {
            return $value;
        }

        if (method_exists($class, $method)) {
            return $this->run($class, $method, ...$parameters);
        }

        return null;
    }

    /**
     * Calls the object's methods one by one and returns the first non-empty value.
     *
     * @param object|callable|string $class
     * @param array|string $methods
     * @param mixed ...$parameters
     *
     * @throws ReflectionException
     *
     * @return mixed
     */
    public function runMethods(object|callable|string $class, array|string $methods, mixed ...$parameters): mixed
    {
        if ($value = $this->callback($class, $methods, ...$parameters)) {
            return $value;
        }

        foreach (ArrHelper::wrap($methods) as $method) {
            if ($value = $this->runExists($class, $method, ...$parameters)) {
                return $value;
            }
        }

        return null;
    }

    /**
     * Calls a method of an object that matches a class.
     *
     * @param array $map
     * @param mixed $value
     * @param mixed ...$parameters
     *
     * @throws ReflectionException
     *
     * @return mixed|null
     */
    public function runOf(array $map, mixed $value, mixed ...$parameters): mixed
    {
        if ($this->validated($value)) {
            foreach ($map as $class => $method) {
                if (InstanceHelper::of($value, $class)) {
                    return $this->runExists($value, $method, ...$parameters);
                }
            }
        }

        return null;
    }

    /**
     * Gets the result of executing code in the specified class, if allowed.
     *
     * @param bool $when
     * @param callable|Closure|string $class
     * @param string $method
     * @param mixed ...$parameters
     *
     * @throws ReflectionException
     *
     * @return mixed|null
     */
    public function when(bool $when, object|callable|string $class, string $method, ...$parameters): mixed
    {
        return $when ? $this->run($class, $method, ...$parameters) : null;
    }

    /**
     * Getting the result of a callback.
     *
     * @param mixed $callback
     * @param mixed ...$parameters
     *
     * @return mixed
     */
    public function callback(mixed $callback, mixed ...$parameters): mixed
    {
        if (is_callable($callback)) {
            return $callback(...$parameters);
        }

        return null;
    }

    protected function resolve(object|callable|string $class): object
    {
        return IsHelper::object($class) ? $class : new $class();
    }

    protected function reflection(object|callable|string $class): ReflectionClass
    {
        return ReflectionHelper::resolve($class);
    }

    protected function validate(mixed $class): void
    {
        if (! $this->validated($class)) {
            throw new InvalidArgumentException('Argument #1 must be either a class reference or an instance of a class, ' . gettype($class) . ' given.');
        }
    }

    protected function validated(mixed $class): bool
    {
        return is_callable($class) || InstanceHelper::exists($class) || IsHelper::object($class) || InstanceHelper::of($class, Closure::class);
    }
}
