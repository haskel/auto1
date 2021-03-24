<?php

namespace App\Validator;

use App\Constant\Sorting;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class SupportedVacancySortingValidator extends ConstraintValidator
{
    private array $supportedSorting = [
        "seniorityLevel",
        "salary"
    ];

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof SupportedVacancySorting) {
            throw new UnexpectedTypeException($constraint, SupportedVacancySorting::class);
        }

        if (null === $value) {
            return;
        }

        if (!in_array($value, $this->supportedSorting, true)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ sortBy }}', $value)
                ->addViolation();
        }
    }
}
