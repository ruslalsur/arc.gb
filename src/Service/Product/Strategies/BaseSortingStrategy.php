<?php


namespace Service\Product\Strategies;

use Model\Entity\Product;

abstract class BaseSortingStrategy
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
     * лишнее это, но захотелось и потыкать по ссылочкам в представлении
     * @param Product $array что массив продуктов для сортировки
     * @param String $sortField имя поля в продукте по которому надо отсортировать массив с продуктами
     * @return array отсортированный массив
     */
    protected function SortProcess($array, $sortField): array
    {
        usort($array, function($previos, $next) use ($sortField) {
            $result = 0;

            //пришлось конструировать метод, а то поле в продукте недоступно отсюда напрямую
            $method = 'get' . ucfirst($sortField);

            if ($previos->$method() != $next->$method()) {
                $result = ($previos->$method() < $next->$method()) ? -1 : 1;
            }

            return $result;
        });

        return $array;
    }
}