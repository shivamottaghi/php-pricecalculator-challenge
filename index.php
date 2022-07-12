<?php
require 'vendor/autoload.php';
require 'controller/homePageController.php';
require 'model/Customer.php';
require 'model/DBConnection.php';
require 'model/DataManager.php';
require 'model/Product.php';
require 'controller/LogInController.php';
require 'controller/submitOrderController.php';

session_start();

include 'view/header.php';
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['login'])){
    $controller = new LogInController();
}elseif(isset($_GET['page'])){
    if ($_GET['page'] == 'submitOrder'){
        $controller = new submitOrderController();
//    } elseif($_GET['page'] == 'homePage'){
//        $controller = new HomePageController();
//    } else {
//        session_unset();
//        $controller = new LogInController();
    }
}else{
    $controller = new homePageController();
}
$controller->render($_POST, $_GET);
include 'view/footer.php';

