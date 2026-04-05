<?php
require_once __DIR__ . '/db.php';

class Enroll{
    private $conn;
    private $id;
    private $student_id;
    private $lesson_id;
    private $payment;

    public function getId(){
        return $this->id;
    }
    
    public function getStudentId(){
        return $this->student_id;
    }
    public function getLessonId(){
        return $this->lesson_id;
    }
    public function getPayment(){
        return $this->payment;
    }

    function __construct()
    {
        $database = new Db();
        $this->conn = $database->connect();
    }

    public function getLessonsByStudent($student_id){
        $sql = 'SELECT l.title, l.coach_name, l.date, L.level, e.payment  
        FROM enrollments e 
        JOIN lessons l ON e.lesson_id = l.id 
        WHERE e.student_id = :student_id';

        $stmt = $this-> conn->prepare($sql);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $sql = 'SELECT e.* , s.name, l.title 
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                JOIN lessons l ON e.e.lesson_id = l.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function createEnroll($student_id, $lesson_id){
        $sql = 'INSERT INTO enrollments (student_id,	lesson_id, payment)
                VALUE(:student_id, :lesson_id, :payment)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'student_id' => $student_id,
            'lesson_id' => $lesson_id,
            'payment' => 'En attente',
        ]);
    }

    public function updatePayment($id, $payment){
        $sql = 'UPDATE enrollments 
                SET payment = :payment
                WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'payment' => $payment,
        ]);
    }

}
?>