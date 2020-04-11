<?php


namespace Service\Product\Strategies;

use Model\Entity\Product;

abstract class ContractSortingStrategy
{
    /**
     * позовите нотариуса, будем заключать контракт со всемя стратегиями сразу
     * @param array $products
     * @return array
     */
    abstract public function start(array $products): array;

    /**
     * чтобы этот функционал не дублировать во всех стартегиях был использован абстрактный класс
     * вместо интерфейса, который может тока договора подписывать, да контракты заключать и всё
     * @param Product[] $products массив продуктов для сортировки
     * @param String $sortField имя поля в продукте по которому надо отсортировать массив с продуктами
     * @return Product[] отсортированный массив продуктов
     */
    protected function SortProcess($products, $sortField): array
    {
        usort($products, function($previos, $next) use ($sortField) {
            $result = 0;

            //пришлось конструировать метод, а то поле в продукте недоступно отсюда напрямую
            $method = 'get' . ucfirst($sortField);

            if ($previos->$method() != $next->$method()) {
                $result = ($previos->$method() < $next->$method()) ? -1 : 1;
            }

            return $result;
        });

        return $products;
    }
}