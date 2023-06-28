<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint;

use Symfony\Component\Validator\Constraints\Choice;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class EnumValuesConstraint extends Choice
{
    protected string $className;

    protected function normalizeOptions(mixed $options): array
    {
        $options = parent::normalizeOptions($options);

        $this->className = $options['className'];
        $this->choices = array_map(static fn($case) => $case->value, $this->className::cases());

        return $options;
    }

    public function className(): string
    {
        return $this->className;
    }

    public static function getErrorName(string $errorCode): string
    {
        return $errorCode;
    }
}
