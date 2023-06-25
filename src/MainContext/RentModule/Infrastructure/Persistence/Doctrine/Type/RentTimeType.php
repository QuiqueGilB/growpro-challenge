<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\Persistence\Doctrine\Type;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type\DoctrineDateIntervalType;

final class RentTimeType extends DoctrineDateIntervalType
{
    public static function typeForClass(): string
    {
        return RentTime::class;
    }
}
