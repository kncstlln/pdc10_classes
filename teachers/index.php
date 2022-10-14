<?php

include ("../init.php");
use Models\Teacher;

$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$showTeachers = $teacher->getAll();
var_dump($showTeachers);