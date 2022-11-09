<?php 

class userModel {
    private $conn;
    private $table = "users";

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function getAllUsers()
    {
        $this->conn->query('SELECT * FROM ' . $this->table);
        return $this->conn->setResult();
    }

    public function getUserById($id)
    {
        $this->conn->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->conn->bind('id', $id);
        return $this->conn->single();
    }

    public function addUser($data)
    {
        $sql = "INSERT INTO " . $this->table . " (name, email, phone) VALUES (:name, :email, :phone)";


        $this->conn->query($sql);
        $this->conn->bind('name', $data['name']);
        $this->conn->bind('email', $data['email']);
        $this->conn->bind('phone', $data['phone']);

        $this->conn->execute();

        return $this->conn->rowCount();
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";

        $this->conn->query($sql);
        $this->conn->bind('id', $id);
        $this->conn->execute();

        return $this->conn->rowCount();
    }
}