<?php

require_once __DIR__ .'/db.php';

class User{
    private $conn;

    private $id;
    private $email;
    private $password;
    private $role;

    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getrole(){
        return $this->role;
    }

    public function __construct(){
        $database = new Db();
        $this->conn = $database->connect();
    }

    public function register($email,$password)
    {
        $sql = "INSERT INTO users(email, password, role)
                VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function logIn($email, $password){

        $sql = "SELECT * FROM users
                WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            return $user;
        }
          return null;
    }
    

    public function findById($id){
        $sql = "SELECT * 
                FROM users 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email){
        $sql = "SELECT * 
                FROM users 
                WHERE email = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


}
?>