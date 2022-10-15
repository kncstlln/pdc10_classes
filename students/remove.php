<?php

include ("../init.php");
use Models\Student;

$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$student->getById();
$student->delete();

$template = $mustache->loadTemplate('student/delete.mustache');
echo $template->render(compact('student'));