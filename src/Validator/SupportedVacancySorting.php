<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SupportedVacancySorting extends Constraint
{
    public string $message = 'Sort by "{{ sortBy }}" is not supported.';
}
