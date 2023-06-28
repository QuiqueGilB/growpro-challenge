<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\Command\CreateBike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Command;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final readonly class CreateBikeCommand extends Command
{
    public function __construct(
        public Uuid $id,
        public BikeType $type,
        public BikePlan $plan,
    ) {
        parent::__construct();
    }
}
