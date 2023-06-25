<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Unit\MainContext\RentModule\Domain\Service;

use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Entity\Bike;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Enum\BikePlan;
use QuiqueGilB\GrowPro\MainContext\RentModule\Domain\Service\BikeBasePrice;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\Enum\Currency;
use QuiqueGilB\GrowPro\SharedContext\SharedModule\Domain\ValueObject\Money;
use QuiqueGilB\GrowPro\Tests\Shared\Stub\BikeStub;
use QuiqueGilB\GrowPro\Tests\Unit\UnitTestCase;

class BikeBasePriceTest extends UnitTestCase
{
    private BikeBasePrice $bikeBasePrice;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bikeBasePrice = new BikeBasePrice();
    }

    /** @dataProvider stagesTestBasePrices */
    public function testBasePrices(Bike $bike): void
    {
        $expectedPrice = match ($bike->plan()) {
            BikePlan::BASIC => 10,
            BikePlan::PREMIUM => 30,
        };

        $expectedMoney = new Money($expectedPrice, Currency::EUR);

        self::assertEquals($expectedMoney, ($this->bikeBasePrice)($bike));
    }

    /** @return iterable<array{0: Bike}> */
    public function stagesTestBasePrices(): iterable
    {
        $bikeStub = new BikeStub();

        yield [$bikeStub->withPlan(BikePlan::BASIC)->stub()];
        yield [$bikeStub->withPlan(BikePlan::PREMIUM)->stub()];
    }
}
