<?php

class LogInController
{
    public function render(){
        $dbManage = new DataManager();
        $customerList = $dbManage->fetchCustomers();
        if(isset($_SESSION['login'])){
            echo '<h1>you are already logged in! </h1>';
            require 'view/homePageView.php';
        }else{
            if (isset($_POST['submitLogIn'])){
                $id = $_POST['submitLogIn'];
                $customer = $dbManage->fetchOneCustomer($id);
                //$_SESSION['login'] =
                  //  new Customer($customer[0]['firstname'], $customer[0]['lastname'], $customer[0]['group_id'], $customer[0]['fixed_discount'], $customer[0]['variable_discount'] );
                $_SESSION['login'] = $customer;
                var_dump($customer);
//                $_SESSION['login'] = new Customer();
                //require 'view/homePageView.php';
                return;
            }else{
                require 'view/logInView.php';
            }
            /// I will improve it later!
            /// at this point I just want them to choose who they are so that I can calculate their discount
        }
    }
}