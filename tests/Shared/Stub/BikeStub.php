<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Shared\Stub;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\CreatedAt;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\UpdatedAt;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Uuid;

/**
 * @extends Stub<Bike>
 * @method $this withId(Uuid $id)
 * @method $this withType(BikeType $type)
 * @method $this withPlan(BikePlan $plan)
 */
final class BikeStub extends Stub
{
    public static function stubOf(): string
    {
        return Bike::class;
    }

    public function randomize(): array
    {
        return [
            'id' => Uuid::v4(),
            'plan' => $this->faker->randomElement(BikePlan::cases()),
            'type' => $this->faker->randomElement(BikeType::cases()),
            'updatedAt' => new UpdatedAt($this->faker->dateTimeImmutable()),
            'createdAt' => new CreatedAt($this->faker->dateTimeImmutable())
        ];
    }
}
