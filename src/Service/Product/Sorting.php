<?php


namespace Service\Product;


use Service\Product\Strategies\ContractSortingStrategy;

class Sorting
{
    private ContractSortingStrategy $sortingStrategy;

    /**
     * Sorting constructor.
     * @param ContractSortingStrategy $sortTypeStrategy
     */
    public function __construct(ContractSortingStrategy $sortTypeStrategy)
    {
        $this->sortingStrategy = $sortTypeStrategy;
    }

    /**
     * возможность внезапно изменить стратегию
     * @param ContractSortingStrategy $sortTypeStrategy
     */
    public function changeSortingStrategy(ContractSortingStrategy $sortTypeStrategy) {
        $this->sortingStrategy = $sortTypeStrategy;
    }

    /**
     * применение стратегии, до сих пор хочется, назвать метод "apply"
     * @param $products
     * @return array
     */
    public function sorting($products): array
    {
        return $this->sortingStrategy->start($products);
    }
}