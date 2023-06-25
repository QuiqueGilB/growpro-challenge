<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Model\AggregateRoot;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final class Bike extends AggregateRoot
{
    public function __construct(
        Uuid $id,
        private BikeType $type,
        private BikePlan $plan,
    ) {
        parent::__construct($id);
    }

    public function type(): BikeType
    {
        return $this->type;
    }

    public function plan(): BikePlan
    {
        return $this->plan;
    }
}
