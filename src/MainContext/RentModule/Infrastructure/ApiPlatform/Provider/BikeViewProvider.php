<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\ApiPlatform\Provider;

use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Doctrine\Orm\State\ItemProvider;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Contract\BikeRepository;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\View\BikeView;

final readonly class BikeViewProvider implements ProviderInterface
{
    public function __construct(
        private BikeRepository $bikeRepository,
        private ItemProvider $itemProvider,
        private CollectionProvider $collectionProvider,
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $result = $this->collectionProvider->provide($operation, $uriVariables, $context);

        return array_map([$this, 'parse'], iterator_to_array($result->getIterator()));
    }

    private function parse(Bike $bike): BikeView
    {
        return new BikeView(
            id: $bike->id(),
            type: $bike->type(),
            plan: $bike->plan(),
            updatedAt: $bike->updatedAt(),
            createdAt: $bike->createdAt(),
        );
    }
}
