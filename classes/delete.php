<?php

include ("../init.php");
use Models\ClassRecord;


$id=$_GET['id'] ?? null;
$classes= new ClassRecord('', '', '', '', '', '');
$classes->setConnection($connection);
$classes->getById($id);
$classes->delete();
header('Location: index.php');
?>