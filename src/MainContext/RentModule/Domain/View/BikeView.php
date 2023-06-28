<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\View;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\CreatedAt;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\UpdatedAt;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final readonly class BikeView
{
    public function __construct(
        public Uuid $id,
        public BikeType $type,
        public BikePlan $plan,
        public UpdatedAt $updatedAt,
        public CreatedAt $createdAt,
    ) {
    }
}
