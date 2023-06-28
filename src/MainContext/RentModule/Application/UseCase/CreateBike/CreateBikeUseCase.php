<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\UseCase\CreateBike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract\BikeRepository;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final readonly class CreateBikeUseCase
{
    public function __construct(private BikeRepository $bikeRepository)
    {
    }

    public function __invoke(Uuid $bikeId, BikePlan $bikePlan, BikeType $bikeType): Bike
    {
        $bike = new Bike($bikeId, $bikeType, $bikePlan);
        $this->bikeRepository->save($bike);
        return $bike;
    }
}
