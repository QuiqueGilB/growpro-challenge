<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

interface BikeRepository
{
    public function byId(Uuid $bikeId): ?Bike;

    public function save(Bike $bike): void;
}
