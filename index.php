<?php
require_once __DIR__ . '/APP/controller/gérantController.php';
require_once __DIR__ . '/APP/controller/studentController.php';


$gerant = new GerantController();
$lessons = $gerant->index();

$student = new StudentController();
$students = $student->index();

?>