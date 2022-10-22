<?php

include ("../init.php");
use Models\ClassRecord;

try{
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $name= $_POST['name'];
        $code = $_POST['code'];
        $description = $_POST['description'];
        
        $classes= new ClassRecord ('', '', '', '', '','');
        $classes->setConnection($connection);
        $classes->getById($id);
        $classes->updateClass($name, $code, $description);
        header('Location: index.php');

    }
    }
    catch (Exception $e) {
        error_log($e->getMessage());
    }
    


?>