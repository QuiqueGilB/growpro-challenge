<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Shared\Faker;

use DateTimeImmutable;
use Faker\Generator;

final class Faker extends Generator
{
    public function dateTimeImmutable(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->dateTime()->format('Y-m-d H:i:s'));
    }
}
