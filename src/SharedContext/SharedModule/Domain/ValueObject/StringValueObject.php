<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\SimpleValueObject;

abstract readonly class StringValueObject extends ValueObject implements SimpleValueObject
{
    public function __construct(public string $value)
    {
        parent::__construct();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
