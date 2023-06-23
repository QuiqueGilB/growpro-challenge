<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Exception\InvalidErrorCodeException;

final readonly class ErrorCode extends StringValueObject
{
    private const REGEX = '/^([A-Z]*_?[A-Z])*$/';

    protected static function exceptionClass(): ?string
    {
        return InvalidErrorCodeException::class;
    }

    protected function doValidate(): void
    {
        parent::doValidate();
        preg_match(self::REGEX, $this->value) || throw InvalidErrorCodeException::byCode($this->value);
    }
}
