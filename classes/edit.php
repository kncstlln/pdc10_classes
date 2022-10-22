<?php

include ("../init.php");
use Models\ClassRecord;
use Models\Teacher;

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../templates/class')
]);
$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$showTeachers = $teacher->getAll();

$template = $mustache->loadTemplate('edit');
echo $template->render(compact('showTeachers'));

$id = $_GET['id'];
$class= new ClassRecord('','', '', '', '', '');
$class->setConnection($connection);
$class->getById($id);
$name = $class->getName();
$code = $class->getCode();
$description = $class->getDescription();


echo $mustache->render('edit', compact('class', 'id','name','code','description'));
