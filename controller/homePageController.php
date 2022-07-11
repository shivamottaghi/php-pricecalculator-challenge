<?php
class homePageController
{
    /*protected array $products;*/

    public function render($POST , $GET)
    {
        $dbManage = new DataManager();
        $productList  = $dbManage->fetchProducts();
        if (isset($POST['buyProduct'])  && $POST['randcheck']==$_SESSION['rand']){
            $name = $productList[$POST['buyProduct']]['name'];
            $price = $productList[$POST['buyProduct']]['price']/100;
            $addedToCart = new Product($name , $price);
            array_push($_SESSION['cart'], $addedToCart);
            var_dump($_SESSION['cart']);
        }
        var_dump($_SESSION['login']);
        include 'view/homePageView.php';
    }
}