<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Model\AggregateRoot;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Money;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final class Rent extends AggregateRoot
{
    public function __construct(
        Uuid $id,
        private readonly Bike $bike,
        private RentTime $rentTime,
        private Money $price
    )
    {
        parent::__construct($id);
    }

    public function bike(): Bike
    {
        return $this->bike;
    }

    public function rentTime(): RentTime
    {
        return $this->rentTime;
    }

    public function price(): Money
    {
        return $this->price;
    }
}
