<?php

include ("../init.php");
use Models\ClassRoster;

$class_roster= new ClassRoster('', '', '', '', '', '');
$class_roster->setConnection($connection);
$showRoster = $class_roster->displayClassRoster();


$template = $mustache->loadTemplate('classroster/index.mustache');
echo $template->render(compact('showRoster'));

?>