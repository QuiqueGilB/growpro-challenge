<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\Type;

use Doctrine\DBAL\Types\IntegerType;

abstract class DoctrineIntType extends IntegerType implements DoctrineType
{
    use DoctrineTypeTrait;
    use DoctrineSimpleTypeTrait;
}
