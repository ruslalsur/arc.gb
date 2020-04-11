<?php


namespace Service\Product\Strategies;


class UnsortSortingStrategy extends BaseSortingStrategy
{
    /**
     * стратегическая сортировака без сортировки (надо)
     * @param array $products
     * @return array
     */
    public function start(array $products): array
    {
        return $products;
    }
}