<?php

class LogInController
{
    public function render($POST , $GET)
    {
        $dbManage = new DataManager();
        $customerList = $dbManage->fetchCustomers();
        if (isset($POST['submitLogIn'])) {
            $id = $POST['submitLogIn'];
            $dbManage->fetchDiscounts($id);
            $customer = $dbManage->fetchOneCustomer($id);
            $_SESSION['login'] =
            new Customer($customer[0]['id'],$customer[0]['firstname'], $customer[0]['lastname'], $customer[0]['group_id']
                ,$dbManage->getFixedArr(),$dbManage->getVariableArr());
            var_dump($customer);
            $controller = new homePageController();
            $controller->render($POST, $GET);
            require 'view/homePageView.php';
        } else {
            require 'view/logInView.php';
        }
        /// I will improve it later!
        /// at this point I just want them to choose who they are so that I can calculate their discount

    }
}