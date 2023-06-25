<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\StringConstraints;

abstract class DoctrineStringType extends StringType implements DoctrineType
{
    use DoctrineTypeTrait;
    use DoctrineSimpleTypeTrait;

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $column['length'] ??= static::length();
        $column['fixed'] ??= static::fixed();

        return parent::getSQLDeclaration($column, $platform);
    }

    public static function fixed(): bool
    {
        return false;
    }

    public static function length(): int
    {
        return 255;
    }
}
