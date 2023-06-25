<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

readonly class Cqrs
{
    public Uuid $id;

    public function __construct()
    {
        $this->id = Uuid::v7();
    }
}
