<?php
require_once __DIR__ .'/db.php';
class lesson {
    private $conn;
    private static $table = "lessons";

    public function __construct(){
        $database = new Db();
        $this->conn = $database->connect();
    }
    public function getAllLessons()
    {
        $sql = "SELECT * FROM " . static::$table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>