<?php
class DataManager
{
    protected DBConnection $dbc;
    protected PDO $pdo;
    protected array $products;

    public function __construct()
    {
        $this->dbc = new DBConnection();
        $this->pdo = $this->dbc->getDbc();
    }

    public function fetchProducts(){
        $stmt = $this->pdo->query("select name , price from product");
        $this->products = $stmt->fetchAll();

        return $this->products;
    }
}