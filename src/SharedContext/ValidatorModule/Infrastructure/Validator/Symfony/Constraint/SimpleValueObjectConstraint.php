<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowProSharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint;

use Symfony\Component\Validator\Constraint;

final class SimpleValueObjectConstraint extends Constraint
{
    public function __construct(
        public readonly string $className,
        mixed $options = null,
        array $groups = null,
        mixed $payload = null,
    ) {
        parent::__construct($options, $groups, $payload);
    }

    public static function getErrorName(string $errorCode): string
    {
        return $errorCode;
    }
}
