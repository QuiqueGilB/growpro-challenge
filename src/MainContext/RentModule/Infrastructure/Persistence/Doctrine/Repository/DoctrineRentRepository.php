<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\Persistence\Doctrine\Repository;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract\RentRepository;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Rent;
use QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine\DoctrineRepository;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

/** @extends DoctrineRepository<Rent> */
final class DoctrineRentRepository extends DoctrineRepository implements RentRepository
{
    protected static function entityClass(): string
    {
        return Rent::class;
    }

    public function byId(Uuid $rentId): ?Rent
    {
        return $this->repository->find($rentId);
    }

    public function save(Rent $rent): void
    {
        $this->persist($rent);
    }
}
