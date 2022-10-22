<?php

include ("../init.php");
use Models\Teacher;


$id=$_GET['id'] ?? null;
$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$teacher->getById($id);
$teacher->delete();
header('Location: index.php');
?>