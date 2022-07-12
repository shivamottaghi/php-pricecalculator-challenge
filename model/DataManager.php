<?php

class DataManager
{
    private DBConnection $dbc;
    private PDO $pdo;
    private array $products;
    private array $customers;
    private int $fixedDiscount;
    private int $variableDiscount;
    private int $customerId;
    public function __construct()
    {
        $this->dbc = new DBConnection();
        $this->pdo = $this->dbc->getPdo();
    }

    public function fetchProducts(): array
    {
        $stmt = $this->pdo->query("select name , price from product");
        $this->products = $stmt->fetchAll();
        return $this->products;
    }

    public function fetchCustomers(): array
    {
        $stmt = $this->pdo->query('select id , firstname , lastname from customer');
        $this->customers = $stmt->fetchAll();
        return $this->customers;
    }

    public function fetchOneCustomer($id): array
    {
        $stmt = $this->pdo->query('select * from customer where id =' . $id);
        return $stmt->fetchAll();
    }

    public function fetchDiscounts($customerId): void
    {
        $this->customerId = $customerId;
        $this->fixedDiscount = $this->totalFixedDiscounts();
        $this->variableDiscount = $this->bestVariableDiscount();
    }

    //-_-_-_-_-_-_-_-_-_- total discount calculation start -_-_-_-_-_-_-_-_-_-
    private function bestVariableDiscount() : int
    {
        $varArr = $this->fetchAllDiscounts('variable_discount');
        return max($varArr);
    }
    /**
     * @return int
     */
    private function totalFixedDiscounts() : int{
        $fixedArr = $this->fetchAllDiscounts('fixed_discount');
        $total = 0;
        foreach ($fixedArr as $discount){
            $total+= $discount;
        }
        return $total;
    }
    private function fetchAllDiscounts(string $col) : array
    {
        $final = [];
        $stmt = $this->pdo->query('select group_id , '.$col.'  from customer where id = ' . $this->customerId);
        $arr = $stmt->fetchAll();
        if ($arr[0][$col] !== null) {
            array_push($final , $arr[0][$col]);
        }
        $parentId = $arr[0]['group_id'];
        while ($parentId !== null) {
            $stmt = $this->pdo->query('select parent_id , '.$col.' from customer_group where id = ' . $parentId);
            $arr = $stmt->fetchAll();
            if ($arr[0][$col] !== null) {
                array_push($final , $arr[0][$col]);
            }
            $parentId = $arr[0]['parent_id'];
        }
        return $final;
    }
    //-_-_-_-_-_-_-_-_-_- total fixed discount calculation END -_-_-_-_-_-_-_-_-_-
    /**
     * @return int
     */
    public function getFixedDiscount(): int
    {
        return $this->fixedDiscount;
    }

    /**
     * @return int
     */
    public function getVariableDiscount(): int
    {
        return $this->variableDiscount;
    }


}