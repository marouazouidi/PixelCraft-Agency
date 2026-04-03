<?php
require_once __DIR__ . '/../model/student.php';

class EnrollController{
    public function index(){
        $enrollModel = new Enroll();
    }
}
?>