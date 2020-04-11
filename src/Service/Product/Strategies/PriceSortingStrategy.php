<?php


namespace Service\Product\Strategies;


class PriceSortingStrategy extends BaseSortingStrategy
{
    /**
     * стратегическая сортировака по цене
     * @param array $products
     * @return array
     */
    public function start(array $products): array
    {
        return $this->SortProcess($products, 'price');
    }
}