<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");

 /*if the user is loggen in, make the username variable equal to username. If user is not logged in, send him back to register page.*/
if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

?>

<html>
<head>
	<title>Vítejte na webu Circularních projektů</title>

  <!-- jQuery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <!-- Bootstrap 3.3.2 - https://getbootstrap.com/docs/3.3/getting-started/ -->
  <script src="assets/js/bootstrap.js"></script>
  <link rel="stylesheet"  type="text/css" href="assets/css/bootstrap.css">

  <!-- my JS file -->
  <script src="assets/js/demo.js"></script>

  <!-- J Crop Files-->
  <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />


  <!-- Fontawesome link -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

  <!-- my style sheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/tabulka.css">

</head>
<body>

<div class="top_bar container">
  <div class="logo">
    <img class="" src="assets/images/circlogo.png" alt="" width="25" height="25">
    <a href="index.php">Circularní Projekty</a>
  </div>

  <nav>
    <a href="#">
      <?php
        echo $user['first_name'];
      ?>
    </a>
    <a href="index.php"><i class="fa fa-home fa-lg"></i></a>
    <a href="project.php"> Projekty <i class='fas fa-frog'></i> </a>
    <a href="messages.php"> Zprávy <i class="fa fa-envelope fa-lg"></i></a>
    <a href="#"><i class="fa fa-bell-o fa-lg"></i></a>
    <a href="requests.php"> Žádosti <i class="fa fa-users fa-lg"> </i></a>
    <a href="upload.php"> Profilovka <i class="fa fa-cog fa-lg"></i></a>
    <a href="#"><i class="fas fa-question"></i></a><!-- link to user-manual -->
    <a href="contact.php"> Kontakt <i class="far fa-comment"></i></a><!-- link to user-manual -->
    <a href="includes\handlers\logout.php"><i class="fa fa-sign-out-alt fa-lg"></i></a>

  </nav>

</div>

<div class="wrapper">
