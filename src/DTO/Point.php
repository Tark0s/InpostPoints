<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Point
{
    #[SerializedName('name')]
    public string $name;

    #[SerializedName('address_details')]
    public Address $address;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}
