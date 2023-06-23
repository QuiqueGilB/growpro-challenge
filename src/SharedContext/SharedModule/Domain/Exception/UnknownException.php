<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Exception;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\ErrorCode;

class UnknownException extends DomainException
{
    public static function domainErrorCode(): ErrorCode
    {
        return new ErrorCode('UNKNOWN');
    }

    public static function unknown(): static
    {
        return new static('');
    }
}
