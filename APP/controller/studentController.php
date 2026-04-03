<?php
require_once __DIR__ . '/../model/student.php';

class StudentController{
    public function index(){
        $student = new Student();
        $students = $student->getAll();
        return $students;
    }
}
?>