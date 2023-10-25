<?php
session_start();

class Connection {
    public $host = 'localhost';
    public $user = 'root';
    public $password = '';
    public $db_name = 'oop';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        // Check the connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

class Register extends Connection {
    public function registration($name, $username, $email, $password, $confirmpassword) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement using prepared statements
        $stmt = $this->conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");

        // Bind parameters and execute the statement
        $stmt->bind_param("ssss", $name, $username, $email, $hashedPassword);
        
        // Check if password matches confirmation
        if ($password !== $confirmpassword) {
            return 100; // Password does not match confirmation
        }

        // Execute the statement and check for success
        if ($stmt->execute()) {
            // Registration successful
            return 1;
        } else {
            // Registration failed
            return 0;
        }
    }
}
