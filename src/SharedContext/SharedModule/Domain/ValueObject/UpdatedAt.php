<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use DateTimeImmutable;
use DateTimeZone;

final readonly class UpdatedAt extends DateTimeValueObject
{
    public function __construct()
    {
        parent::__construct((new DateTimeImmutable())->setTimezone(new DateTimeZone('UTC')));
    }
}
