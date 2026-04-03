<?php
require_once __DIR__ . '/../model/lesson.php';

class GerantController {
    public function index(){
        $lesson = new lesson();
        $lessons = $lesson->getAllLessons();
        return $lessons;
    }
}
?>