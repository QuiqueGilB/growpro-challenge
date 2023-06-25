<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Contract;

use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\Query;
use QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model\QueryResponse;

/** @method QueryResponse __invoke(Query $query) */
interface QueryHandler
{
}
