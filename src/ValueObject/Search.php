<?php

namespace App\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;

class Search
{
    #[Assert\NotBlank(message: 'City is required.')]
    #[Assert\Length(min: 3, max: 64)]
    private ?string $city = null;

    #[Assert\Length(min: 3, max: 64, groups: ['Default'])]
    private ?string $street = null;

    #[Assert\Regex(
        pattern: '/^\d{2}-\d{3}$/',
        message: 'The postal code must follow the format XX-XXX.',
    )]
    private ?string $postalCode = null;

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }
}

