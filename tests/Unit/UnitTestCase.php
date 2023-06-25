<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Unit;

use PHPUnit\Framework\TestCase;
use QuiqueGilB\GrowPro\Tests\Shared\Faker\Faker;
use QuiqueGilB\GrowPro\Tests\Shared\Faker\FakerFactory;

abstract class UnitTestCase extends TestCase
{
    protected Faker $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = FakerFactory::create();
    }
}
