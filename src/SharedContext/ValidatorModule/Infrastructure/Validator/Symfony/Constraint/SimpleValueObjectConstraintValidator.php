<?php

declare(strict_types=1);

namespace QuiqueGilB\GrowProSharedContext\ValidatorModule\Infrastructure\Validator\Symfony\Constraint;

use QuiqueGilB\GrowProSharedContext\SharedModule\Domain\Exception\DomainException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Throwable;
use TypeError;

final class SimpleValueObjectConstraintValidator extends ConstraintValidator
{
    /**
     * @param SimpleValueObjectConstraint $constraint
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        try {
            if (is_null($value)) {
                return;
            }
            new $constraint->className($value);
        } catch (DomainException|TypeError $exception) {
            $errorCode = $exception instanceof DomainException
                ? $exception::domainErrorCode()->value
                : 'INVALID_TYPE';

            $this->context->buildViolation($exception->getMessage())
                ->setCode($errorCode)
                ->addViolation();
        } catch (Throwable) {
        }
    }
}
