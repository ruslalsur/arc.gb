<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;

class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        //чтобы не писать ниразу условия, раз уж поклялись этого не делать
        //будем конкатенировать название нужного класса стратегии из принятой строки
        $strategyClass = 'Service\\Product\\Strategies\\' . ucfirst($sortType) . 'SortingStrategy';
        $strategy = new $strategyClass();
        $sorting = new Sorting($strategy);

        return $sorting->sorting($productList);
    }


    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
