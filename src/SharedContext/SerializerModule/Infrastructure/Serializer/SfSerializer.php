<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowProSharedContext\SerializerModule\Infrastructure\Serializer;

use QuiqueGilB\GrowProSharedContext\SerializerModule\Domain\Contract\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

readonly class SfSerializer implements Serializer
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function serialize(mixed $data, string $outputFormat, array $context = []): string
    {
        return $this->serializer->serialize($data, $outputFormat, $context);
    }
}
