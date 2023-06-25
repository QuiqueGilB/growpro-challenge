<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\CqrsModule\Domain\Model;

use ArrayObject;

/**
 * @template T
 * @extends ArrayObject<int, T>
 * @implements  QueryResponseData<T[]>
 */
class ArrayQueryResponseData extends ArrayObject implements QueryResponseData
{
    /** @param T[] $array */
    public function __construct(array $array)
    {
        parent::__construct(array_values($array));
    }

    /** @return T[] */
    public function value(): array
    {
        return $this->getArrayCopy();
    }
}
