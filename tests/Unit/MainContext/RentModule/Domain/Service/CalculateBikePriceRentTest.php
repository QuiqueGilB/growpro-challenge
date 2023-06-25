<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Unit\MainContext\RentModule\Domain\Service;

use PHPUnit\Framework\MockObject\MockObject;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikeType;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Service\BikeBasePrice;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Service\CalculateBikePriceRent;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\ValueObject\RentTime;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Enum\Currency;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Money;
use QuiqueGilB\GrowPro\Tests\Shared\Stub\BikeStub;
use QuiqueGilB\GrowPro\Tests\Unit\UnitTestCase;

class CalculateBikePriceRentTest extends UnitTestCase
{
    private MockObject&BikeBasePrice $bikeBasePriceMock;
    private CalculateBikePriceRent $calculateBikePriceRent;

    public function setUp(): void
    {
        parent::setUp();
        $this->bikeBasePriceMock = $this->createPartialMock(BikeBasePrice::class, ['__invoke']);
        $this->calculateBikePriceRent = new CalculateBikePriceRent($this->bikeBasePriceMock);

        $this->bikeBasePriceMock->method('__invoke')->willReturn(new Money(10, Currency::EUR));
    }

    /** @dataProvider stagesTestCalculateBikePriceRent */
    public function testCalculateBikePriceRent(Bike $bike, RentTime $rentTime): void
    {
        $basePrice = $this->bikeBasePriceMock->__invoke($bike);
        $absoluteDays = (int)ceil($rentTime->days());

        $expectedRentPrice = match ($bike->type()) {
            BikeType::ELECTRIC => $basePrice->amount * $absoluteDays,
            BikeType::NORMAL => $absoluteDays < 3 ? $basePrice->amount : $basePrice->amount * ($absoluteDays - 3),
            BikeType::OLD => $absoluteDays < 5 ? $basePrice->amount : $basePrice->amount * ($absoluteDays - 5),
        };

        $expectedRentMoney = new Money($expectedRentPrice, $basePrice->currency);

        $actualRentMoney = $this->calculateBikePriceRent->__invoke($bike, $rentTime);

        self::assertEquals($expectedRentMoney, $actualRentMoney);
    }

    public function stagesTestCalculateBikePriceRent(): iterable
    {
        $bikeStub = new BikeStub();

        yield 'plan premium, type electric, 3 days' => [
            $bikeStub->withPlan(BikePlan::PREMIUM)->withType(BikeType::ELECTRIC)->stub(),
            new RentTime(new \DateInterval('P3D'))
        ];
        yield 'plan premium, type normal, 2 days' => [
            $bikeStub->withPlan(BikePlan::PREMIUM)->withType(BikeType::NORMAL)->stub(),
            new RentTime(new \DateInterval('P2D'))
        ];
        yield 'plan premium, type normal, 4 days' => [
            $bikeStub->withPlan(BikePlan::PREMIUM)->withType(BikeType::NORMAL)->stub(),
            new RentTime(new \DateInterval('P4D'))
        ];
        yield 'plan basic, type old, 3 days' => [
            $bikeStub->withPlan(BikePlan::BASIC)->withType(BikeType::OLD)->stub(),
            new RentTime(new \DateInterval('P3D'))
        ];
        yield 'plan basic, type old, 7 days' => [
            $bikeStub->withPlan(BikePlan::BASIC)->withType(BikeType::OLD)->stub(),
            new RentTime(new \DateInterval('P7D'))
        ];
    }
}
