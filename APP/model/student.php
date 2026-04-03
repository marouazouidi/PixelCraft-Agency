<?php

require_once __DIR__ .'/db.php';

class Student{
    private $conn;

    private $id;
    private $name;
    private $country;
    private $level;
    private $user_id;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getCountry(){
        return $this->country;
    }
    public function getLevel(){
        return $this->level;
    }

    public function getUserId(){
        return $this->user_id;
    }


    public function __construct(){
        $database = new Db();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM  students";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findById($id){
        $sql = "SELECT * 
                FROM students 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByUserId($user_id){
        $sql = "SELECT * 
                FROM students 
                WHERE user_id = :user_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["user_id" => $user_id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}
?>