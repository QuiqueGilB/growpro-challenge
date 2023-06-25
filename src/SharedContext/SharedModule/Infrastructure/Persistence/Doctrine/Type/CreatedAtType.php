<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Infrastructure\Persistence\Doctrine\Type;

use QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type\DoctrineDateTimeImmutableType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\CreatedAt;

final class CreatedAtType extends DoctrineDateTimeImmutableType
{
    public static function typeForClass(): string
    {
        return CreatedAt::class;
    }
}
