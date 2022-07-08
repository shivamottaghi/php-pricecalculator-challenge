<?php
require 'vendor/autoload.php';
require 'controller/homePageController.php';
require 'model/Customer.php';
require 'view/homePageView.php';
require 'model/DBConnection.php';
require 'model/DataManager.php';


$controller = new homePageController();
$controller->render();

