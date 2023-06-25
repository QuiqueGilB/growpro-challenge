<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

use Doctrine\DBAL\Types\FloatType;

abstract class DoctrineFloatType extends FloatType implements DoctrineType
{
    use DoctrineTypeTrait;
    use DoctrineSimpleTypeTrait;
}
