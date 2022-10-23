<?php
include ("../init.php");
use Models\Teacher;

$id = $_GET['id'];
$teacher= new Teacher('', '', '', '', '', '');
$teacher->setConnection($connection);
$teacher->getById($id);

$first_name = $teacher->getFirstName();
$last_name = $teacher->getLastName();
$showClass = $teacher->viewClass($id);

$template = $mustache->loadTemplate('teacher/view.mustache');
echo $template->render(compact('showClass','first_name','last_name'));
?>