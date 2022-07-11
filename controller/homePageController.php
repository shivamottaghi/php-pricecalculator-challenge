<?php
class homePageController
{
    /*protected array $products;*/

    public function render()
    {
        $dbManage = new DataManager();
        $productList  = $dbManage->fetchProducts();
        if (isset($_POST['buyProduct'])  && $_POST['randcheck']==$_SESSION['rand']){
            $name = $productList[$_POST['buyProduct']]['name'];
            $price = $productList[$_POST['buyProduct']]['price']/100;
            $addedToCart = new Product($name , $price);
            array_push($_SESSION['cart'], $addedToCart);
            var_dump($_SESSION['cart']);
        }
        var_dump($_SESSION['login']);
        include 'view/homePageView.php';
    }
}