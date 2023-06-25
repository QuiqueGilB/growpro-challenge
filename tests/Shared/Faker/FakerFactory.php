<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\Tests\Shared\Faker;

use Faker\Factory;

final class FakerFactory extends Factory
{
    public static function create($locale = self::DEFAULT_LOCALE): Faker
    {
        $generator = new Faker();

        foreach (self::$defaultProviders as $provider) {
            $providerClassName = self::getProviderClassname($provider, $locale);
            $generator->addProvider(new $providerClassName($generator));
        }

        return $generator;
    }
}
