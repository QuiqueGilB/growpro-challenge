<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\Command\CreateBike;

use QuiqueGilB\GrowPro\MainContext\RentModule\Application\UseCase\CreateBike\CreateBikeUseCase;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract\CommandHandler;

final readonly class CreateBikeCommandHandler implements CommandHandler
{
    public function __construct(
        private CreateBikeUseCase $createBikeUseCase
    ) {
    }

    public function __invoke(CreateBikeCommand $command): void
    {
        $this->createBikeUseCase->__invoke(
            $command->id,
            $command->plan,
            $command->type,
        );
    }
}
