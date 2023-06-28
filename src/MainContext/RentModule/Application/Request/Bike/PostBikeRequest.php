<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\MainContext\RentModule\Application\Request\Bike;

final readonly class PostBikeRequest
{
    public function __construct(
        public string $id,
        public string $type,
        public string $plan,
    ) {
    }
}
