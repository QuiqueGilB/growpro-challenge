<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Service;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Enum\Currency;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Money;

final readonly class BikeBasePrice
{
    public function __invoke(Bike $bike): Money
    {
        return match ($bike->plan()) {
            BikePlan::BASIC => new Money(10, Currency::EUR),
            BikePLan::PREMIUM => new Money(30, Currency::EUR)
        };
    }
}
