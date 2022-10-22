<?php

include ("../init.php");
use Models\ClassRecord;
use Models\Teacher;


$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$showTeachers = $teacher->getAll();


$template = $mustache->loadTemplate('class/add.mustache');
echo $template->render(compact('showTeachers'));


try{
    if(isset($_POST['name'])) {
    $class = new ClassRecord ($_POST['name'], $_POST['code'], $_POST['description'], $_POST['employee_number']);
    $class->setConnection($connection);
    $class->addClass();

    header('Location: index.php');
}
}

catch (Exception $e) {
    error_log($e->getMessage());
}

?>