<?php

namespace App\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute] class StreetRequiresPostalCode extends Constraint
{
    public string $message = 'If a street is provided, a postal code is required.';
}
