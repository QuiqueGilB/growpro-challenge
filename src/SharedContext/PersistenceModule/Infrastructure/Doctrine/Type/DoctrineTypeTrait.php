<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;

trait DoctrineTypeTrait
{
    public static function typeName(): string
    {
        return static::typeForClass();
    }

    public function getName(): string
    {
        return static::typeName();
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return false;
    }
}
