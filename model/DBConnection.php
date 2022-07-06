<?php


class DBConnection
{

    public function __construct()
    {
        require_once 'config.php';
        try {
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            echo "Connected to $db at $host successfully.";
        } catch (PDOException $pe) {
            die("Could not connect to the database $db :" . $pe->getMessage());
        }

    }
}