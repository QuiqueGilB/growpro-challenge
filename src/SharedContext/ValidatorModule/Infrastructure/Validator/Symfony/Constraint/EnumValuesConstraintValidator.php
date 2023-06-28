<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowPro\SharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint;

use QuiqueGilB\GrowProSharedContext\SharedModule\Domain\Exception\DomainException;
use QuiqueGilB\GrowProSharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint\SimpleValueObjectConstraint;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\ChoiceValidator;
use Symfony\Component\Validator\ConstraintValidator;
use Throwable;

final class EnumValuesConstraintValidator extends ChoiceValidator
{
    public function __construct()
    {
    }

}
