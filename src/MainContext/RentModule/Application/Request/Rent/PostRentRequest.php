<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\Request\Rent;

final readonly class PostRentRequest
{
    public function __construct(
        public string $rentId,
        public string $bikeId,
        public int $days,
    ) {
    }
}
