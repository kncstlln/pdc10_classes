<?php

include ("../init.php");
use Models\Student;

$student= new Student($_POST['first_name'], $_POST['last_name'], $_POST['student_number'], $_POST['email'], $_POST['contact'], $_POST['program']);
$student->setConnection($connection);
$showStudents = $student->addStudent();
var_dump($student);