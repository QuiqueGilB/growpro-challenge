<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Infrastructure\Persistence\Doctrine\Type;

use QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type\DoctrineStringType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final class UuidType extends DoctrineStringType
{
    public static function typeForClass(): string
    {
        return Uuid::class;
    }

    public static function length(): int
    {
        return 36;
    }

    public static function fixed(): bool
    {
        return true;
    }
}
