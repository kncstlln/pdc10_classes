<?php

include ("../init.php");
use Models\Student;


$id=$_GET['id'] ?? null;
$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$student->getById($id);
$student->delete();
header('Location: index.php');
?>