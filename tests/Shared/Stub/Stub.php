<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Shared\Stub;

use QuiqueGilB\GrowPro\Tests\Shared\Faker\Faker;
use QuiqueGilB\GrowPro\Tests\Shared\Faker\FakerFactory;
use ReflectionClass;

/**
 * @template T of object
 */
abstract class Stub
{
    private array $properties = [];
    protected readonly Faker $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
        $this->reset();
    }

    /** @return class-string<T> */
    abstract public static function stubOf(): string;

    abstract public function randomize(): array;

    public function reset(): void
    {
        $this->properties = [];
    }

    public function __call(string $name, array $arguments): static
    {
        str_starts_with($name, 'with') && $this->magicWith($name, $arguments);
        return $this;
    }

    private function magicWith(string $name, array $arguments): static
    {
        $property = mb_strtolower($name[4]) . substr($name, 5);
        $this->properties[$property] = $arguments[0];
        return clone $this;
    }

    /** @return T */
    public function stub(): object
    {
        $reflectionClass = new ReflectionClass(static::stubOf());
        $instance = $reflectionClass->newInstanceWithoutConstructor();

        $props = $this->properties + $this->randomize();

        do {
            foreach ($reflectionClass->getProperties() as $property) {
                if (array_key_exists($property->getName(), $props)) {
                    $property->setValue($instance, $props[$property->getName()]);
                }
            }
        } while ($reflectionClass = $reflectionClass->getParentClass());

        return $instance;
    }
}
