<?php

include ("../init.php");
use Models\Student;

$id = $_GET['id'];
$student= new Student('','','','','','');
$student->setConnection($connection);
$student->getById($id);

echo $mustache->render('edit', compact('student'));

