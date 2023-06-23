<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Model;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\CreatedAt;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\UpdatedAt;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

abstract class Aggregate
{
    protected readonly CreatedAt $createdAt;
    protected UpdatedAt $updatedAt;

    public function __construct(protected Uuid $id)
    {
        $this->createdAt = new CreatedAt();
        $this->updatedAt = new UpdatedAt();
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }
}
