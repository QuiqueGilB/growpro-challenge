<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

readonly class QueryResponseMetadata
{
    public function __construct(
        public int $results,
        public int $total,
        public int $limit,
        public int $offset,
    ) {
    }

    public static function unique(): self
    {
        return new self(1, 1, 1, 0);
    }
}
