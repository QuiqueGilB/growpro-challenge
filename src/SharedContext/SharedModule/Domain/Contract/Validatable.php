<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract;

interface Validatable
{
    public function isValid(): bool;

    public function validate(): void;
}
