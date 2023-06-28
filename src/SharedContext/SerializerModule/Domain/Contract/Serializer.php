<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowProSharedContext\SerializerModule\Domain\Contract;

interface Serializer
{
    /** @param array<string, mixed> $context */
    public function serialize(mixed $data, string $outputFormat, array $context): string;
}
