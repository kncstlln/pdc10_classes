<?php

include ("../init.php");
use Models\Teacher;

try{
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $employee_number = $_POST['employee_number'];
        
        $student= new Teacher ('', '', '', '', '', '');
        $student->setConnection($connection);
        $student->getById($id);
        $student->updateTeacher($first_name, $last_name, $email, $contact, $employee_number);
        header('Location: index.php');
    

    }
    }
    catch (Exception $e) {
        error_log($e->getMessage());
    }
    


?>