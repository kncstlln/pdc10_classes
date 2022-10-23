<?php
include ("../init.php");
use Models\ClassRoster;


try {
	if (isset($_POST['class_code'])) 
	{
		$addRoster = new ClassRoster($_POST['student_number'], $_POST['class_code']);
		$addRoster->setConnection($connection);
		$addRoster->addClassRoster();
		header('Location: index.php');
	}
}

catch (Exception $e) {
	error_log($e->getMessage());
}

?>