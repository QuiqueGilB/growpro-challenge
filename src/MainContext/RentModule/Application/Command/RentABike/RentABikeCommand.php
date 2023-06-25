<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\Command\RentABike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Command;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final readonly class RentABikeCommand extends Command
{
    public function __construct(
        public Uuid $rentId,
        public Uuid $bikeId,
        public RentTime $rentTime,
    )
    {
        parent::__construct();
    }
}
