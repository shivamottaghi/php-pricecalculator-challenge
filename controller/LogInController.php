<?php

class LogInController
{
    public function render()
    {
        $dbManage = new DataManager();
        $customerList = $dbManage->fetchCustomers();
        if (isset($_POST['submitLogIn'])) {
            $id = $_POST['submitLogIn'];
            $customer = $dbManage->fetchOneCustomer($id);
            $_SESSION['login'] =
            new Customer($customer[0]['firstname'], $customer[0]['lastname'], $customer[0]['group_id'] );
            //$_SESSION['login'] = $customer;
            var_dump($customer);
            //$_SESSION['login'] = new Customer();
            $controller = new homePageController();
            $controller->render();
            require 'view/homePageView.php';
        } else {
            require 'view/logInView.php';
        }
        /// I will improve it later!
        /// at this point I just want them to choose who they are so that I can calculate their discount

    }
}