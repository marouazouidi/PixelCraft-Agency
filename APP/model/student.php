<?php

require_once __DIR__ .'/db.php';

class Student{
    private $conn;

    private static $table = "students";
    private $id;
    private $name;
    private $country;
    private $level;

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


    public function __construct(){
        $database = new Db();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function create(){

    }

    public function edit($id){

    }

    public function delete($id){

    }
}
?>