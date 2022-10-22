<?php

include ("../init.php");
use Models\Teacher;

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader('../templates/teacher')
]);

$id = $_GET['id'];
$teacher= new Teacher('','','','','','');
$teacher->setConnection($connection);
$teacher->getById($id);
$first_name = $teacher->getFirstName();
$last_name = $teacher->getLastName();
$email = $teacher->getEmail();
$contact = $teacher->getContact();
$employee_number = $teacher->getEmployeeNumber();


echo $mustache->render('edit', compact('teacher', 'id','first_name','last_name','email', 'contact' , 'employee_number'));