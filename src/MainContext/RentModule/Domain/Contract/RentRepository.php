<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Rent;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

interface RentRepository
{
    public function byId(Uuid $rentId): ?Rent;

    public function save(Rent $rent): void;
}
