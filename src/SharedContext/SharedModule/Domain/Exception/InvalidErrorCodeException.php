<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Exception;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\ErrorCode;

class InvalidErrorCodeException extends DomainException
{
    public static function domainErrorCode(): ErrorCode
    {
        return new ErrorCode('INVALID_ERROR_CODE');
    }

    public static function byCode(string $code): static
    {
        return new static(sprintf('The code %s is a invalid error code', $code));
    }
}
