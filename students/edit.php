<?php

include ("../init.php");
use Models\Student;

$student= new Student($_PUT['first_name'], $_PUT['last_name'], $_PUT['student_number'], $_PUT['email'], $_PUT['contact'], $_PUT['program']);
$student->setConnection($connection);
$showStudents = $student->addStudent();
var_dump($student);