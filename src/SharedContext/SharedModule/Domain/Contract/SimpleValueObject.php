<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract;

use DateInterval;
use DatePeriod;
use DateTimeImmutable;

interface SimpleValueObject
{
    public function value(): string|int|float|DateTimeImmutable|DateInterval|DatePeriod;
}
