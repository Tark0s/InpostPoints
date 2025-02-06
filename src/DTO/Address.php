<?php

namespace App\DTO;


use Symfony\Component\Serializer\Annotation\SerializedName;

class Address
{
    #[SerializedName('street')]
    public ?string $street = null;

    #[SerializedName('building_number')]
    public ?string $buildingNumber = null;

    #[SerializedName('city')]
    public string $city;

    #[SerializedName('post_code')]
    public ?string $postCode = null;

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    public function getBuildingNumber(): ?string
    {
        return $this->buildingNumber;
    }

    public function setBuildingNumber(?string $buildingNumber): void
    {
        $this->buildingNumber = $buildingNumber;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(?string $postCode): void
    {
        $this->postCode = $postCode;
    }
}
