<?php require_once 'layouts/header.php'?>

<?php
//  $_SESSION['role'] !== 'user' ? header("location:index.php") : 'You are now loggedin';

if($_SESSION['role'] !== 'user')
{
    echo "<script>alert('Invalid Token') </script>";
    echo "<script>window.location.href='index.php'</script>";
}

print_r($_SESSION);
 
 
 ?>


<?php require_once 'layouts/footer.php'?>


