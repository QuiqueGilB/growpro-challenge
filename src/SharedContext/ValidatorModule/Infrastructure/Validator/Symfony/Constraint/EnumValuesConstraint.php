<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint;

use Symfony\Component\Validator\Constraints\Choice;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class EnumValuesConstraint extends Choice
{
    #[AsNamedArgument]
    public function __construct(string $className) {
        parent::__construct(func_get_args());
        $this->choices = array_map(static fn($case) => $case->value, $className::cases());
    }

    public static function getErrorName(string $errorCode): string
    {
        return $errorCode;
    }
}
