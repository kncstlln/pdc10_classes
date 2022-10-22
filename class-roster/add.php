<?php

include ("../init.php");
use Models\Student;
use Models\Teacher;
use Models\ClassRoster;

$code = $_GET['code']??null;

$student= new Student('', '', '', '', '', '');
$student->setConnection($connection);
$showStudents = $student->getAll();

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader('../templates/ClassRoster')
]);

$template = $mustache->loadTemplate('add');
echo $template->render(compact('showStudents', 'code'));

try {
    if(isset($_POST['student_number'])){
        $class_roster = new ClassRoster($_POST['code'], $_POST['student_number']);
        $class_roster->setConnection($connection);
        $class_roster->addClassRoster();
        //var_dump($_POST['student_number']);
        header('Location: index.php');
    }
} catch (Exception $e) {
    
    exit();
}