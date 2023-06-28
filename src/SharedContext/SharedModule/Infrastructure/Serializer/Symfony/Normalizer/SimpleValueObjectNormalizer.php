<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Infrastructure\Serializer\Symfony\Normalizer;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\SimpleValueObject;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\DateTimeValueObject;
use DateTimeImmutable;
use DateTimeInterface;
use ReflectionClass;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

readonly class SimpleValueObjectNormalizer implements NormalizerInterface, DenormalizerInterface
{
    private DateTimeNormalizer $dateTimeNormalizer;

    public function __construct()
    {
        $this->dateTimeNormalizer = new DateTimeNormalizer();
    }

    /**
     * @param mixed $object
     * @param string|null $format
     * @param array<string, mixed> $context
     * @return float|int|bool|\ArrayObject<string|int, mixed>|array<string|int, mixed>|string|null
     */
    public function normalize(
        mixed $object,
        string $format = null,
        array $context = [],
    ): float|int|bool|\ArrayObject|array|string|null {
        $value = $object?->value();

        return $value instanceof DateTimeInterface
            ? $this->dateTimeNormalizer->normalize($value, $format, $context)
            : $value;
    }

    /**
     * @param class-string $type
     * @param array<string, mixed> $context
     * @throws \ReflectionException
     */
    public function denormalize(mixed $data, string $type, string $format = null, array $context = [])
    {
        $reflectionClass = new ReflectionClass($type);
        return $reflectionClass->isSubclassOf(DateTimeValueObject::class)
            ? new $type($this->dateTimeNormalizer->denormalize($data, DateTimeImmutable::class, $format, $context))
            : new $type($data);
    }

    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof SimpleValueObject;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return class_exists($type) && (new ReflectionClass($type))->implementsInterface(SimpleValueObject::class);
    }
}
