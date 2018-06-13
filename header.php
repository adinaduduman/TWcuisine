<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="shortcut icon" href="img.png" />
<title>Retete pentru regim alimentar special</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="header">
<a href="index.php">
  <img src="img.png" alt="Image">
  </a>
  <h1>Retete culinare</h1>
  <h2>rapid &#8226; sanatos &#8226; gustos </h2>
</div>

<div class="navbar">

  <a href="index.php">Acasa </a>
  <a href="retete.php">Retete </a>
  <a href="trimite.php" >Trimite reteta</a>

 <a href="alteresurse.php"> Resurse </a>
  <a href="contact.php" >Contact</a>
  <a href="desprenoi.php" >Despre noi</a>
  <a href="descarca.php" >Formate auxiliare</a>
  <?php if ( isset($_SESSION['username']) ) { ?>
      <a href="index.php?logout='1'" class="right"> Logout </a>
      <a href="" class="right"> <?php  echo $_SESSION['username'] ?> </a>
  <?php } else { ?>
      <a href="login.php" class="right"> Login </a>
      <a href="register.php" class="right"> Register </a>
   <?php } ?>
</div>
