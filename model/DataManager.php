<?php

class DataManager
{
    protected DBConnection $dbc;
    protected PDO $pdo;
    protected array $products;
    protected array $customers;
    protected array $fixedArr;
    protected array $variableArr;
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

    public function fetchDiscounts($customerId)
    {
        $fixedArr = [];
        $variableArr= [];
        $stmt = $this->pdo->query('select group_id , fixed_discount, variable_discount  from customer where id = ' . $customerId);
        $arr = $stmt->fetchAll();
        if ($arr[0]['fixed_discount'] !== null) {
            array_push($fixedArr, $arr[0]['fixed_discount']);
        }
        if ($arr[0]['variable_discount'] !== null) {
            array_push($variableArr, $arr[0]['variable_discount']);
        }
        $parentId = $arr[0]['group_id'];

        while ($parentId !== null) {
            $stmt = $this->pdo->query('select parent_id , fixed_discount , variable_discount from customer_group where id = ' . $parentId);
            $arr = $stmt->fetchAll();
            if ($arr[0]['fixed_discount'] !== null) {
                array_push($fixedArr, $arr[0]['fixed_discount']);
            }
            if ($arr[0]['variable_discount'] !== null) {
                array_push($variableArr, $arr[0]['variable_discount']);
            }
            $parentId = $arr[0]['parent_id'];
        }
        $this->variableArr = $variableArr;
        $this->fixedArr = $fixedArr;
    }

    /**
     * @return array
     */
    public function getFixedArr(): array
    {
        return $this->fixedArr;
    }

    /**
     * @return array
     */
    public function getVariableArr(): array
    {
        return $this->variableArr;
    }

}