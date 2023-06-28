<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Infrastructure\ApiPlatform\Handler\Rent;

use DateInterval;
use QuiqueGilB\GrowPro\MainContext\RentModule\Application\Command\RentABike\RentABikeCommand;
use QuiqueGilB\GrowPro\MainContext\RentModule\Application\Request\Rent\PostRentRequest;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract\CommandBus;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class PostRentApiPlatformHandler
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    public function __invoke(PostRentRequest $postRentRequest): void
    {
        $this->commandBus->handle(
            new RentABikeCommand(
                new Uuid($postRentRequest->rentId),
                new Uuid($postRentRequest->bikeId),
                new RentTime(new DateInterval(sprintf('P%dD', $postRentRequest->days)))
            ),
        );
    }
}
