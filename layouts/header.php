<?php 
session_start();
require_once 'function/autoload.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alas Thrifts</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Permanent+Marker&display=swap" rel="stylesheet">
  
   
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand title" href="./index.php">Alas Thrifts</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="snapback.php">Vintage Snapback Hat</a></li>
            <li><a class="dropdown-item" href="jersey.php">Vintage Jersey</a></li>
            <li><a class="dropdown-item" href="products.php">All</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#" tabindex="-1">Contact us</a>
        </li>
      </ul>
      <div>
       <?php if(isset($_SESSION['role'])): ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active btn btn-sm btn-primary text-white mr-1 " href="cart.php?id=<?=$_SESSION['id']?>" tabindex="-1"><i class="fas fa-shopping-cart">  <span class="badge badge-secondary"><!-- DISPLAY No of Carts --></span></h2> </i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                 Settings
                </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="cart.php?id=<?=$_SESSION['id']?>">My Cart</a></li>
                <li><a class="dropdown-item" href="order.php?id=<?=$_SESSION['id']?>">My Order</a></li>
                <li><a class="dropdown-item" href="#">Account</a></li>
                <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Do you want to logout?')">Logout</a></li>
              </ul>
          </li>
          </ul>
      <div>
       
      
       <?php else: ?>
        <button class="btn btn-sm btn-primary p-2" data-toggle="modal" data-target="#login">Login</button> 
        <button class="btn btn-sm btn-secondary p-2" data-toggle="modal" data-target="#register">Register</button>
        <?php endif; ?>
    </div>
  </div>
</nav>
<body>
    
