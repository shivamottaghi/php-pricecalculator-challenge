<?php

class DBConnection
{
    protected PDO $dbc;

    public function __construct()
    {


        $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
        $dotenv->load();

        try {
            $this->dbc = new PDO('mysql:host=' . $_ENV['DATABASE_HOST'] . ';dbname=' . $_ENV['DATABASE_NAME'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
            echo 'Connected to '.$_ENV['DATABASE_NAME']. 'at'. $_ENV['DATABASE_HOST'].' successfully.';
        } catch (PDOException $pe) {
            die('Could not connect to the database'. $_ENV['DATABASE_NAME'].' :' . $pe->getMessage());
        }

    }
}