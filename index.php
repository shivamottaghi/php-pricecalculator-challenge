<?php
require 'vendor/autoload.php';
require 'controller/homePageController.php';
require 'model/Customer.php';
require 'model/DBConnection.php';
require 'model/DataManager.php';

include 'view/header.php';
$controller = new homePageController();
$controller->render();
include 'view/footer.php';

