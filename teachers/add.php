<?php

include ("../init.php");
use Models\Teacher;

try{
    if(isset($_POST['first_name'])) {
$teacher = new Teacher($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['contact'], $_POST['employee_number']);
$teacher->setConnection($connection);
$teacher->addTeacher();
header('Location: index.php');
}
}

catch (Exception $e) {
    error_log($e->getMessage());
}

$template = $mustache->loadTemplate('teacher/add.mustache');
echo $template->render();


?>