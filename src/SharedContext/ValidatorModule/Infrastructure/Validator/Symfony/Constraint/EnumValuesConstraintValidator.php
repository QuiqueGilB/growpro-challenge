<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint;

use Symfony\Component\Validator\Constraints\ChoiceValidator;

final class EnumValuesConstraintValidator extends ChoiceValidator
{
    public function __construct()
    {
    }

}
