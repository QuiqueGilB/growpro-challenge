<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Infrastructure\CommandBus;

use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract\CommandBus;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Command;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

readonly class SfMessengerCommandBus implements CommandBus
{
    public function __construct(private MessageBusInterface $messageBus)
    {
    }

    public function handle(Command $command): void
    {
        $this->messageBus->dispatch(new Envelope($command));
    }
}
