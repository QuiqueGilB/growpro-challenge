<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\SimpleValueObject;

abstract readonly class FloatValueObject extends ValueObject implements SimpleValueObject
{
    public function __construct(public float $value)
    {
        parent::__construct();
    }

    public function value(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
