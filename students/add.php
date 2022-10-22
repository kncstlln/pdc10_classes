<?php

include ("../init.php");
use Models\Student;

try{
    if(isset($_POST['first_name'])) {
$student= new Student($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['student_number'], $_POST['contact'], $_POST['program']);
$student->setConnection($connection);
$student->addStudent();
header('Location: index.php');
}
}

catch (Exception $e) {
    error_log($e->getMessage());
}

$template = $mustache->loadTemplate('student/add.mustache');
echo $template->render();

?>