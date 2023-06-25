<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract;

use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Command;

interface CommandBus
{
    public function handle(Command $command): void;
}
