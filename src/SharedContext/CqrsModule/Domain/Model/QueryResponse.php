<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

/**
 * @template T of QueryResponseData
 * @property T $data
 */
class QueryResponse
{
    public readonly Uuid $id;
    public readonly Uuid $inResponseTo;

    /**
     * @param Query $inResponseTo
     * @param T $data
     * @param QueryResponseMetadata $metadata
     */
    public function __construct(
        Query $inResponseTo,
        public readonly QueryResponseData $data,
        public readonly QueryResponseMetadata $metadata,
    ) {
        $this->id = Uuid::v7();
        $this->inResponseTo = $inResponseTo->id;
    }
}
