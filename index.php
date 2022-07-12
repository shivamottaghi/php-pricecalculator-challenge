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
}elseif(isset($_GET['page']) && !isset($_POST['addToCart'])){
    switch ($_GET['page']){
        case 'homePage':
            $controller = new homePageController();
            break;
        case 'login':
              session_unset();
              $controller = new LogInController();
              break;
        case 'submitOrder':
            $controller = new submitOrderController();
            break;
        default:
            $controller = new homePageController();
            break;
    }
}else{
    $controller = new homePageController();
}
$controller->render($_POST, $_GET);
include 'view/footer.php';

