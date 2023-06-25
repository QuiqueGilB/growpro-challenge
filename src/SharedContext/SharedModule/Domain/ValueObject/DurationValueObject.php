<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use DateInterval;
use DateTimeInterface;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\SimpleValueObject;

abstract readonly class DurationValueObject extends ValueObject implements SimpleValueObject
{
    public function __construct(public DateInterval $value)
    {
        parent::__construct();
    }

    public function value(): DateInterval
    {
        return $this->value;
    }

    public function days(): float
    {
        return $this->value->days;
    }

    public function __toString(): string
    {
        return $this->value->format(DateTimeInterface::ATOM);
    }
}
