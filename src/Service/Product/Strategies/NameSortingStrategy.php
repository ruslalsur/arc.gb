<?php


namespace Service\Product\Strategies;


use Model\Entity\Product;

class NameSortingStrategy extends ContractSortingStrategy
{
    /**
     * стратегическая сортировака по названию
     * @param Product[] $products
     * @return Product[]
     */
    public function start($products): array
    {
        return $this->SortProcess($products, 'name');
    }
}