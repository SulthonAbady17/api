<?php
	// Include config.php file
	require_once '../config/Config.php';

	// Create a class Users
	class UserModel extends Config {
	  // Fetch all or a single user from database
	  public function fetch($id = 0) {
	    $sql = 'SELECT * FROM users';
	    if ($id != 0) {
	      $sql .= ' WHERE id = :id';
	    }
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }

	  // Insert an user in the database
	  public function insert($name, $email, $phone) {
	    $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
	    return true;
	  }

	  // Update an user in the database
	  public function update($name, $email, $phone, $id) {
	    $sql = 'UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'id' => $id]);
	    return true;
	  }

	  // Delete an user from database
	  public function delete($id) {
	    $sql = 'DELETE FROM users WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    return true;
	  }
	}

?>