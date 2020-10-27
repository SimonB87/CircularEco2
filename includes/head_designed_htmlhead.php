<?php //This is redesigned header in 2020
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Notification.php");

 /*if the user is loggen in, make the username variable equal to username. If user is not logged in, send him back to register page.*/
if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

$userLoggedInFillerPlaceholder = $user['username'];
$userLoggedInNameFillerPlaceholder = $user['first_name'] . " " . $user['last_name'];

?>

<html>
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CSE7MKYW1L"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-CSE7MKYW1L');
  </script>

  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Vítejte na webu Circularních projektů</title>

  <!-- for carousel -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


  <link rel="stylesheet" type="text/css" href="assets/css/carousel-projects.css">

  <!-- <script src="assets/js/carousel-projects.js"></script> -->

  <!-- jQuery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


  <!-- Bootstrap 3.3.2 - https://getbootstrap.com/docs/3.3/getting-started/ -->
  <script src="assets/js/bootstrap.js" defer></script>
  <link rel="stylesheet"  type="text/css" href="assets/css/bootstrap.css">

  <script src="assets/js/bootbox.js"></script>

  <!-- my JS file -->
  <script src="assets/js/demo.js"></script>
  <!-- my carousel JS file -->
  <script src="assets/js/carousel.js"></script>

  <!-- J Crop Files-->
  <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />


  <link rel='stylesheet' href='assets/libs/fontawesome/fontawesome_v5.5.0.min.css'>


  <!-- my style sheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/style_designed.css">
  <link rel="stylesheet" type="text/css" href="assets/css/projectinfo.css">
  <link rel="stylesheet" type="text/css" href="assets/css/projectdashboard.css">
  
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/tabulka.css"> -->

  <link rel="stylesheet" href="assets/css/newProjectSumbissionForm.css" type="text/css" />

  <script src="assets/js/editNewProjectSumbissionForm.js" defer></script>
  <!------ Include the above in your HEAD tag ---------->
