<?php 
    session_start();
   
    // session_destroy();
    unset($_SESSION['role']);
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['isloggedin']);
   
    
    header("location:../../index.php");


?>