<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\UseCase\RentABike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract\BikeRepository;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract\RentRepository;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Rent;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Exception\BikeNotFoundException;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Service\CalculateBikePriceRent;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final readonly class RentABikeUseCase
{
    public function __construct(
        private CalculateBikePriceRent $calculateBikePriceRent,
        private BikeRepository $bikeRepository,
        private RentRepository $rentRepository,
    ) {
    }

    public function __invoke(Uuid $rentId, Uuid $bikeId, RentTime $rentTime): Rent
    {
        $bike = $this->bikeRepository->byId($bikeId) ?? throw BikeNotFoundException::byId($bikeId);
        $rentPrice = $this->calculateBikePriceRent->__invoke($bike, $rentTime);

        $rent = new Rent($rentId, $bike, $rentTime, $rentPrice);
        $this->rentRepository->save($rent);

        return $rent;
    }
}
