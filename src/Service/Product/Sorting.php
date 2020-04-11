<?php


namespace Service\Product;


use Service\Product\Strategies\BaseSortingStrategy;

class Sorting
{
    private BaseSortingStrategy $sortingStrategy;

    /**
     * Sorting constructor.
     * @param BaseSortingStrategy $sortTypeStrategy
     */
    public function __construct(BaseSortingStrategy $sortTypeStrategy)
    {
        $this->sortingStrategy = $sortTypeStrategy;
    }

    /**
     * возможность внезапно изменить стратегию
     * @param BaseSortingStrategy $sortTypeStrategy
     */
    public function changeSortingStrategy(BaseSortingStrategy $sortTypeStrategy) {
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