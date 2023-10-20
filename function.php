<?php
session_start();

class Connection{
    public $host = 'localhost';
    public $user = 'root';
    public $password = '';
    public $db_name = 'oop';
    public $conn;

    public function __construct(){
        $this -> conn = mysqli_connect($this ->host, $this ->user, $this ->password,$this ->db_name);
    }
 

}
class Register extends Connection{
    public function registration($name,$username, $email,$password,$confirmpassword){
        $duplicate = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' OR email ='$email'");
        if ($duplicate === false) {
            die('Error: ' . mysqli_error($this->conn)); // Print the detailed error message
        }
        
        if (mysqli_num_rows($duplicate) > 0) {
            return 10; // Username or email already exists
        }
        else{
            if($password == $confirmpassword){
            $query = "INSERT INTO users (id,name, username, email, password) VALUES('','$name','$username', '$email', '$password')";
                return 1;
                //reg successful
            }
            else{
                return 100;
            }
        }
    }
}