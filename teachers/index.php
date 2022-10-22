<?php

include ("../init.php");
use Models\Teacher;

$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$showTeachers = $teacher->getAll();

$template = $mustache->loadTemplate('teacher/index.mustache');
echo $template->render(compact('showTeachers'));
