<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Enum\Currency;

final readonly class Money extends ValueObject
{
    public function __construct(public float $amount, public Currency $currency)
    {
        parent::__construct();
    }
}
