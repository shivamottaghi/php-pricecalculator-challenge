<?php
class DataManager
{
    protected DBConnection $dbc;
    protected PDO $pdo;
    protected array $products;
    protected array $customers;

    public function __construct()
    {
        $this->dbc = new DBConnection();
        $this->pdo = $this->dbc->getPdo();
    }

    public function fetchProducts() : array{
        $stmt = $this->pdo->query("select name , price from product");
        $this->products = $stmt->fetchAll();
        return $this->products;
    }

    public function fetchCustomers() : array{
        $stmt = $this->pdo->query('select id , firstname , lastname from customer');
        $this->customers = $stmt->fetchAll();
        return $this->customers;
    }

    public function fetchOneCustomer($id) : array {
        $stmt = $this->pdo->query('select * from customer where id =' .$id);
        return $stmt->fetchAll();
    }
}