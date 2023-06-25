<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

interface DoctrineType
{
    public static function typeName(): string;

    public static function typeForClass(): string;
}
