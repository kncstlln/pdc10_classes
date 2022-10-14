<?php

include ("../init.php");
use Models\ClassRecord;

$class= new ClassRecord('', '', '', '', '', '');
$class->setConnection($connection);
$showClass = $class->getAll();
var_dump($showClass);