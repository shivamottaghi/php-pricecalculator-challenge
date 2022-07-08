<?php
class homePageController
{
    /*protected array $products;*/

    public function render()
    {
        $dbManage = new DataManager();
        $productList  = $dbManage->fetchProducts();

        include 'view/homePageView.php';
    }
}