<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class CityFormatTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        if (null === $value) {
            return '';
        }

        return ucfirst(strtolower($value));
    }

    public function reverseTransform($value)
    {
        return $value;
    }
}
