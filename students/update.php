<?php

include ("../init.php");
use Models\Student;

try{
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $student_number = $_POST['student_number'];
        $contact = $_POST['contact'];
        $program = $_POST['program'];
        
        $student= new Student ('', '', '', '', '', '');
        $student->setConnection($connection);
        $student->getById($id);
        $student->updateStudent($first_name, $last_name, $email, $student_number, $contact, $program);
        header('Location: index.php');

    }
    }
    catch (Exception $e) {
        error_log($e->getMessage());
    }
    


?>