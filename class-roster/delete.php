<?php

include ("../init.php");
use Models\ClassRoster;

$id = $_GET['id']??null;
$roster = new ClassRoster('', '');
$roster->setConnection($connection);
$roster->getById($id);
$roster->delete();
header('Location: index.php');

