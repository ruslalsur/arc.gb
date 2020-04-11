<?php


namespace Service\Product\Strategies;


class NameSortingStrategy extends ContractSortingStrategy
{
    /**
     * стратегическая сортировака по названию
     * @param array $products
     * @return array
     */
    public function start(array $products): array
    {
        return $this->SortProcess($products, 'name');
    }
}