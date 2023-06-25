<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\Persistence\Doctrine\Repository;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract\BikeRepository;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\DoctrineRepository;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

/** @extends DoctrineRepository<Bike> */
final class DoctrineBikeRepository extends DoctrineRepository implements BikeRepository
{
    protected static function entityClass(): string
    {
        return Bike::class;
    }

    public function byId(Uuid $bikeId): ?Bike
    {
        return $this->repository->find($bikeId);
    }

    public function save(Bike $bike): void
    {
        $this->persist($bike);
    }
}
