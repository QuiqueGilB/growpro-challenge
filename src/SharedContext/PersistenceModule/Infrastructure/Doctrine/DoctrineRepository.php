<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\PersistenceModule\Infrastructure\Doctrine;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Model\AggregateRoot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

/** @template T of AggregateRoot */
abstract class DoctrineRepository
{
    /** @var ServiceEntityRepository<T> */
    protected readonly ServiceEntityRepository $repository;
    protected readonly ObjectManager $objectManager;
    protected readonly Expr $expr;

    final public function __construct(ManagerRegistry $registry)
    {
        $this->repository = new ServiceEntityRepository($registry, static::entityClass()); // @phpstan-ignore-line
        $this->objectManager = $registry->getManagerForClass(static::entityClass()); // @phpstan-ignore-line
        $this->expr = new Expr();
    }

    /** @return class-string<T> */
    abstract protected static function entityClass(): string;

    /** @param T $aggregateRoot */
    final protected function persist(AggregateRoot $aggregateRoot): void
    {
        $this->objectManager->persist($aggregateRoot);
    }

    final protected function queryBuilder(string $alias): QueryBuilder
    {
        return $this->repository->createQueryBuilder($alias);
    }
}
