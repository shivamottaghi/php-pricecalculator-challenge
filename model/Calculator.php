<?php

class Calculator
{
    private Customer $customer;
    private array $arrCustomerProducts;
    private float $total;
    public function __construct(object $customer, array $arrCustomerProducts)
    {
        $this->customer=$customer;
        $this->arrCustomerProducts=$arrCustomerProducts;
    }

    /**
     * @return array
     */
    public function getArrCustomerProducts(): array
    {
        return $this->arrCustomerProducts;
    }

    /**
     * @param array $arrCustomerProducts
     */
    public function setArrCustomerProducts(array $arrCustomerProducts): void
    {
        $this->arrCustomerProducts = $arrCustomerProducts;
    }

    /**
     * @return object
     */
    public function getCustomer(): object
    {
        return $this->customer;
    }
public function getTotalProductsPrice():float
    {
        $this->total = 0;
        foreach ($this->arrCustomerProducts as $product) {
            $this->total += $product->getPrice();
        }
        return $this->total;
    }
    public function getFinalPriceFixed():float
    {
        if($this->total < $this->customer->getFixedDiscount()){
            return 0;
        } else {
            return $this->total - $this->customer->getFixedDiscount();
        }
    }
    public function getFinalPriceVariable():float
    {
        return $this->total - $this->total * $this->customer->getVariableDiscount()/100;
    }
}