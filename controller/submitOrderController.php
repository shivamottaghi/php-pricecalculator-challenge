<?php

class submitOrderController
{
    public function render(){

        $calculateThis = new Calculator($_SESSION['login'], $_SESSION['cart']);
        $total = $calculateThis->getTotalProductsPrice();
        $totalPriceWithFixedDiscount = $calculateThis->getFinalPriceFixed();
        $totalPriceWithVarDiscount = $calculateThis->getFinalPriceVariable();
        if($totalPriceWithFixedDiscount>$totalPriceWithVarDiscount){
            $bestOption = "Your best option is " .$totalPriceWithVarDiscount. " with discount: ".$_SESSION['login']->getVariableDiscount()." %";
        } else {
            $bestOption = "Your best option is " .$totalPriceWithFixedDiscount. " with discount: ".$_SESSION['login']->getFixedDiscount()." €";
        }
        require 'view/submitOrderView.php';
    }
}