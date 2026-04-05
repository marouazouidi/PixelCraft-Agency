<?php
require_once __DIR__ .'/db.php';
class lesson {
    private $conn;
    private $id;
    private $title;
    private $coach_name;
    private $date;
    private $price;
    private $level;

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getCoachName(){
        return $this->coach_name;
    }

    public function getDate(){
        return $this->date;
    }

    public function getPrice(){
        return $this->price;
    }

     public function getLevel(){
        return $this->level;
    }

    public function __construct(){
        $database = new Db();
        $this->conn = $database->connect();
    }
    public function getAllLessons()
    {
        $sql = "SELECT * FROM lessons";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id){
        $sql = "SELECT * 
                FROM lessons 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createLesson($title, $coach_name, $date, $price, $level){
        $sql = "INSERT INTO lessons (title, coach_name, date, price, level)
                VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $coach_name, $date, $price, $level]);
    }

    public function updateLesson($id ,$title, $coach_name, $date, $price, $level){
        $sql = "UPDATE lessons 
                SET title = ?, coach_name = ?, date = ?, price = ?, level = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$title, $coach_name, $date, $price, $level, $id]);
    }

    public function deleteLesson($id){
        $sql = "DELETE FROM lessons 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

}
?>