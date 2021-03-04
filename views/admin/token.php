<?php 

if($_SESSION['role'] !== 'admin' && $_SESSION !== 'isloggedin')
{
    // header("location:../../index.php");
    echo "<script>alert('Access Denied! you are not allowed to access this page')</script>";
    echo "<script>window.location.href='../../index.php'</script>";
}

 ?>
