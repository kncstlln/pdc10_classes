<?php

include ("../init.php");
use Models\Student;


$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$showStudents = $student->getAll();

$template = $mustache->loadTemplate('student/index.mustache');
echo $template->render(compact('showStudents'));

