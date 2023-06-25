<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

/** @implements QueryResponseData<string | int | float | bool | null> */
abstract readonly class ScalarQueryResponseData implements QueryResponseData
{
    public function __construct(public string|int|float|bool|null $value)
    {
    }

    public function value(): float|bool|int|string|null
    {
        return $this->value;
    }
}
