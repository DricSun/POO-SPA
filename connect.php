<?php

class connect
{
    private $connection;

    public function __construct(){
        $this->connection =  new PDO('mysql:host=localhost;dbname=spa', 'root', '');
    }
    public function getConnection()
    {
        return $this->connection;
    }
}