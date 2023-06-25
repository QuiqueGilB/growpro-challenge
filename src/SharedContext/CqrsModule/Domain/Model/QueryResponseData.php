<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

/** @template T */
interface QueryResponseData
{
    /** @return T */
    public function value(): mixed;
}
