<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Contract\Id;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Exception\InvalidUuidException;
use Ramsey\Uuid\Uuid as RamseyUuid;

final readonly class Uuid extends StringValueObject implements Id
{
    public function __construct(string $value = null)
    {
        parent::__construct($value ?? self::v7()->value);
    }

    public function validate(): void
    {
        parent::validate();
        if (
            RamseyUuid::NIL === $this->value
            || RamseyUuid::MAX === $this->value
            || !RamseyUuid::isValid($this->value)
        ) {
            throw InvalidUuidException::byValue($this->value);
        }
    }

    public function version(): int
    {
        /** @var \Ramsey\Uuid\Rfc4122\FieldsInterface $fields */
        $fields = RamseyUuid::fromString($this->value)->getFields();
        return $fields->getVersion() ?? 0;
    }

    public static function v4(): static
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public static function v7(): static
    {
        return new static(RamseyUuid::uuid7()->toString());
    }
}
