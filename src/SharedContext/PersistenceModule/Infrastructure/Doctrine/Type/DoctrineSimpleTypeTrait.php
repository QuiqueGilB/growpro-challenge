<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\SimpleValueObject;
use Doctrine\DBAL\Platforms\AbstractPlatform;

trait DoctrineSimpleTypeTrait
{
    /** @param SimpleValueObject | null $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        return parent::convertToDatabaseValue($value?->value(), $platform);
    }

    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): mixed
    {
        return null === $value ? null : new (static::typeForClass())(parent::convertToPHPValue($value, $platform));
    }
}
