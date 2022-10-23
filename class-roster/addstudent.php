<?php
include ("../init.php");
use Models\ClassRoster;
use Models\ClassRecord;
use Models\Student;


$id = $_GET['id'];
$class= new ClassRecord('', '', '', '','', '');
$class->setConnection($connection);
$class->getById($id);
$class_code = $class ->getCode();
$showRosters = $class->displayClassRoster($id);

$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$showStudents = $student->getAll();


$template = $mustache->loadTemplate('classroster/add.mustache');
echo $template->render(compact('showRosters', 'showStudents', 'class_code'));

?>