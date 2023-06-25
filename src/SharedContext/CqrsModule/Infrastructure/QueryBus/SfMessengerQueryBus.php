<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Infrastructure\QueryBus;

use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract\QueryBus;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Query;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\QueryResponse;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\QueryResponseData;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

readonly class SfMessengerQueryBus implements QueryBus
{
    public function __construct(private MessageBusInterface $messageBus)
    {
    }

    /**
     * @param Query $query
     * @return QueryResponse<QueryResponseData<mixed>>
     */
    public function ask(Query $query): QueryResponse
    {
        return $this->messageBus->dispatch(new Envelope($query))
            ->last(HandledStamp::class)
            ?->getResult();
    }
}
