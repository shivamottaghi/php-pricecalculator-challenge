<?php

class submitOrderController
{
    public function render(){

        var_dump($_SESSION['login']);
        var_dump($_SESSION['cart']);
//        $fixedSomething =  $_SESSION['login']->get;
    }
}