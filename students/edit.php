<?php

include ("../init.php");
use Models\Student;

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../templates/student')
]);

$id = $_GET['id'];
$student= new Student('','','','','','');
$student->setConnection($connection);
$student->getById($id);
$first_name = $student->getFirstName();
$last_name = $student->getLastName();
$email = $student->getEmail();
$student_number = $student->getStudentNumber();
$contact = $student->getContact();
$program = $student->getProgram();


echo $mustache->render('edit', compact('student', 'id','first_name','last_name','email', 'student_number', 'contact', 'program'));
