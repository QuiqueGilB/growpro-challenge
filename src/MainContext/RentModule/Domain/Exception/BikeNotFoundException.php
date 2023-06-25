<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Exception;

use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Exception\DomainException;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\ErrorCode;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

final class BikeNotFoundException extends DomainException
{
    public static function domainErrorCode(): ErrorCode
    {
        return new ErrorCode('BIKE_NOT_FOUND');
    }

    public static function byId(Uuid $bikeId): self
    {
        return new self("Bike with id {$bikeId->value()} not found.");
    }
}
