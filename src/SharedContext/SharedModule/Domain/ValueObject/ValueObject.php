<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\IsValidTrait;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\Validatable;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Exception\DomainException;

abstract readonly class ValueObject implements Validatable
{
    use IsValidTrait;

    public function __construct()
    {
        $this->validate();
    }

    public function validate(): void
    {
    }
}
