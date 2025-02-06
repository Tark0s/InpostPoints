<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\ValueObject\Search;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class StreetRequiresPostalCodeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof StreetRequiresPostalCode) {
            throw new \InvalidArgumentException('Invalid constraint.');
        }

        if (!$value instanceof Search) {
            throw new UnexpectedValueException($value, Search::class);
        }

        if ($value->getStreet() && empty($value->getPostalCode())) {
            $this->context->buildViolation($constraint->message)
                ->atPath('postalCode')
                ->addViolation();
        }
    }
}
