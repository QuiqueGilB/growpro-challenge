<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum;

enum BikeType : string
{
    case ELECTRIC = 'electric';
    case NORMAL = 'normal';
    case OLD = 'old';
}
