<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

/** @implements QueryResponseData<static> */
abstract readonly class ObjectQueryResponseData implements QueryResponseData
{
    public function value(): static
    {
        return $this;
    }
}
