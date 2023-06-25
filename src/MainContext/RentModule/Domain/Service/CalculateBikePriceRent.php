<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Service;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Money;

final readonly class CalculateBikePriceRent
{
    public function __construct(private BikeBasePrice $bikeBasePrice)
    {
    }

    public function __invoke(Bike $bike, RentTime $rentTime): Money
    {
        $basePrice = $this->bikeBasePrice->__invoke($bike);
        $absoluteDays = (int)ceil($rentTime->days());

        $totalPrice = match ($bike->type()) {
            BikeType::ELECTRIC => $basePrice->amount * $absoluteDays,
            BikeType::NORMAL => $absoluteDays < 3 ? $basePrice->amount : $basePrice->amount * ($absoluteDays - 3),
            BikeType::OLD => $absoluteDays < 5 ? $basePrice->amount : $basePrice->amount * ($absoluteDays - 5),
        };

        return new Money($totalPrice, $basePrice->currency);
    }
}
