<?php
require 'vendor/autoload.php';
require 'vendor/composer/autoload_real.php';
require 'controller/homePageController.php';
require 'model/Customer.php';
require 'view/homePageView.php';
require 'model/DBConnection.php';


$controller = new homePageController();

