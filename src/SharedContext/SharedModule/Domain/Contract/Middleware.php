<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract;

interface Middleware
{
    public function __invoke(mixed $message, callable $next): mixed;
}
