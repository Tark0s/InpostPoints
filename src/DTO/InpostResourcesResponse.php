<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

class InpostResourcesResponse
{
    #[SerializedName('count')]
    public int $count;

    #[SerializedName('page')]
    public int $page;

    #[SerializedName('totalPages')]
    public int $totalPages;

    #[SerializedName('items')]
    /** @var Point[] */
    public array $items = [];

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages(int $totalPages): void
    {
        $this->totalPages = $totalPages;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function filterByStreet(string $street): void
    {
        $filteredResources = [];

        foreach ($this->getItems() as $point) {
            if ($point->getAddress()->getStreet() === $street){
                $filteredResources[] = $point;
            }
        }

        $this->setCount(count($filteredResources));
        $this->setItems($filteredResources);
    }

    public function filterByPostCode(string $postCode): void
    {
        $filteredResources = [];

        foreach ($this->getItems() as $point) {
            if ($point->getAddress()->getPostCode() === $postCode){
                $filteredResources[] = $point;
            }
        }

        $this->setCount(count($filteredResources));
        $this->setItems($filteredResources);
    }
}
