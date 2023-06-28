<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\ApiPlatform\Handler\Bike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Application\Command\CreateBike\CreateBikeCommand;
use QuiqueGilB\GrowPro\MainContext\RentModule\Application\Request\Bike\PostBikeRequest;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract\CommandBus;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class PostBikeApiPlatformHandler
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    public function __invoke(PostBikeRequest $postBikeRequest): void
    {
        $this->commandBus->handle(
            new CreateBikeCommand(
                new Uuid($postBikeRequest->bikeId),
                BikeType::from($postBikeRequest->type),
                BikePlan::from($postBikeRequest->plan),
            )
        );
    }
}
