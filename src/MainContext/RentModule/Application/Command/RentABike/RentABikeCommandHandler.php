<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\Command\RentABike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Application\UseCase\RentABike\RentABikeUseCase;

final readonly class RentABikeCommandHandler
{
    public function __construct(private RentABikeUseCase $rentABikeUseCase)
    {
    }

    public function __invoke(RentABikeCommand $command): void
    {
        $this->rentABikeUseCase->__invoke(
            $command->rentId,
            $command->bikeId,
            $command->rentTime
        );
    }
}
