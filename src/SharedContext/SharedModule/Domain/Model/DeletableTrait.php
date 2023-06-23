<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Model;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\DeletedAt;
use DateTimeImmutable;

trait DeletableTrait
{
    private ?DeletedAt $deletedAt;

    public function delete(): void
    {
        $this->deletedAt = new DeletedAt();
    }

    public function isDeleted(): bool
    {
        return !is_null($this->deletedAt) && $this->deletedAt->value < new DateTimeImmutable();
    }

    public function deletedAt(): ?DeletedAt
    {
        return $this->deletedAt;
    }
}
