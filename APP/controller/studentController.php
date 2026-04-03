<?php
require_once __DIR__ . '/../model/student.php';

class StudentController{
    public function index(){
        // session_start();

        // if(!isset($_SESSION['user_id'])){
        //     header('Location: login.php');
        //     exit();
        // }

        // if($_SESSION['role' !== 'admin']){
        //     header('Location: studentdashboard.php');
        //     exit();
        // }
        
        $studentModel = new Student();
        $students = $studentModel->getAll();
        return $students;
    }
}
?>