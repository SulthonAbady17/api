<?php 

class userModel {
    private $conn;
    private $table = "users";

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function getAll()
    {
        $this->conn->query('SELECT * FROM ' . $this->table);
        return $this->conn->setResult();
    }
}