<?php
require 'vendor/autoload.php';
require 'controller/homePageController.php';
require 'model/Customer.php';
require 'model/DBConnection.php';
require 'model/DataManager.php';
require 'model/Product.php';
require 'controller/LogInController.php';

session_start();

include 'view/header.php';
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['login'])){
    $controller = new LogInController();
}else{
    $controller = new homePageController();
}
$controller->render();
include 'view/footer.php';

