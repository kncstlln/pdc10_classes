<?php

include ("../init.php");
use Models\Teacher;

$teacher = new Teacher($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact'], $_POST['employee_number']);
$teacher->setConnection($connection);
$showTeachers = $teacher->addTeacher();
var_dump($teachers);