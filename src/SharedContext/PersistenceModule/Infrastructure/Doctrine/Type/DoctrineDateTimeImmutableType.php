<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

use Doctrine\DBAL\Types\DateTimeImmutableType;

abstract class DoctrineDateTimeImmutableType extends DateTimeImmutableType implements DoctrineType
{
    use DoctrineTypeTrait;
    use DoctrineSimpleTypeTrait;
}
