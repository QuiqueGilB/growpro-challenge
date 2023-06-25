<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract;

use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\ValueObject\Executor;

interface Permissible
{
    public function executor(): Executor;
}
