<?php


namespace Service\Product;


use Model\Entity\Product;
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
     * @param Product[] $products
     * @return Product[]
     */
    public function sorting($products): array
    {
        return $this->sortingStrategy->start($products);
    }
}