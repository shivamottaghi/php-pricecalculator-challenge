<?php
class homePageController
{
    protected array $products;

    public function render()
    {
        $dbManage = new DataManager();
        $products = $dbManage->fetchProducts();
        var_dump($products);
    }
}