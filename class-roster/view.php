<?php

include ("../init.php");
use Models\ClassRoster;
use Models\ClassRecord;

$roster_id = intval($_GET['id']);

$id = intval($_GET['id']);
$class= new ClassRecord('', '', '', '', '', '');
$class->setConnection($connection);
$class->getById($id);
$class_code = $class->getCode();
$showClasses = $class->displayClassRoster($id);


$roster= new ClassRoster('','','','','','');
$roster->setConnection($connection);

$viewRoster = $roster->viewClass($class_code);


$template = $mustache->loadTemplate('classroster/view.mustache');
echo $template->render(compact('showClasses', 'viewRoster'));
