<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract;

use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Query;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\QueryResponse;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\QueryResponseData;

interface QueryBus
{
    /**
     * @param Query $query
     * @return QueryResponse<QueryResponseData<mixed>>
     */
    public function ask(Query $query): QueryResponse;
}
