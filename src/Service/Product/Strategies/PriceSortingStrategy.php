<?php


namespace Service\Product\Strategies;


use Model\Entity\Product;

class PriceSortingStrategy extends ContractSortingStrategy
{
    /**
     * стратегическая сортировака по цене
     * @param Product[] $products
     * @return Product[]
     */
    public function start($products): array
    {
        return $this->SortProcess($products, 'price');
    }
}