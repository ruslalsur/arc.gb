<?php


namespace Service\Product\Strategies;


use Model\Entity\Product;

class UnsortSortingStrategy extends ContractSortingStrategy
{
    /**
     * стратегическая сортировака без сортировки (надо)
     * @param Product[] $products
     * @return Product[]
     */
    public function start($products): array
    {
        return $products;
    }
}