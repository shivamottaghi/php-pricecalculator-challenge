<?php
class homePageController
{
    /*protected array $products;*/

    public function render($POST , $GET)
    {
        $dbManage = new DataManager();
        $productList  = $dbManage->fetchProducts();
        if (isset($POST['addToCart'])  && $POST['randcheck']==$_SESSION['rand']){
            $name = $productList[$POST['addToCart']]['name'];
            $price = $productList[$POST['addToCart']]['price']/100;
            $addedToCart = new Product($name , $price);
            array_push($_SESSION['cart'], $addedToCart);
        }
        include 'view/homePageView.php';
    }
}