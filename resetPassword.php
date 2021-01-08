<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>

<html lang="cs">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CSE7MKYW1L"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-CSE7MKYW1L');
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrace | Web pro projekty v Cirkulární ekonomice a Oběhovém hospodářství</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register.min.css">	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>

</head>
<body>

	<div id="wrapper"> 

		<div class="thewrapped">

			<div style="margin: 1rem auto;">
					<button class="button" style="background-color: #e5b896; border: none; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 0 auto; cursor: pointer;"><a href="http://obcevkruhu.cz" style="color:#000;">Zpět na hlavní stránku</a></button>
			</div>

			<div class="login_box">

				<div class="login_header">
					<h1>Obcevkruhu.cz</h1>
					<h3>Modul sociální sítě</h3>
					Obnovení hesla
				</div>
				<br>
				<div id="first">

					<form action="resetPassword.php" method="POST">
						<input id="password1" type="password" name="new_password_1" placeholder="Nové heslo" autocomplete="off" required>
						<br>
            <input id="password2" type="password" name="new_password_2" placeholder="Opakujte opět heslo" autocomplete="off" required>
						<br>
						<input id="submit" type="submit" name="submit" value="Obnov heslo">
						<br>

						<?php 
            require "config/config_password.php";
            if(!isset($_GET["code"])) {
              $password_message =  "Stránka nebyla nalezena.";
            }

            $code = $_GET["code"];

            $getEmailQuery = mysqli_query($con_password, "SELECT email FROM resetPassword WHERE code='$code'");
            if(mysqli_num_rows($getEmailQuery) == 0 ){
              $password_message =  "Stránka s požadavkem nebyla nalezena.";
            }

            $row = mysqli_fetch_array($getEmailQuery);
            $userEmail = $row['email'];

            //test
            echo "test row - userEmail: " . $userEmail . "<br>";
            //test

            if(isset($_POST['new_password_1'])) {

              $new_password_1 = strip_tags($_POST['new_password_1']);
              $new_password_2 = strip_tags($_POST['new_password_2']);

                            //test
                            echo "test - new_password_1:: $new_password_1 :: <br>";
                            echo "test - new_password_2:: $new_password_2 :: <br>";
                            //test

              $new_password_md5 = md5($new_password_1);

              //$password_query = mysqli_query($con, "SELECT password FROM users WHERE email='$userEmail'");

              if($new_password_1 === $new_password_2) {

              //test
              echo "passwords match OK <br>";
              //test
            
              $update_password_query = mysqli_query($con, "UPDATE users SET password='$new_password_md5' WHERE email='$userEmail'");
              $update_query = mysqli_query($con, "UPDATE users SET friend_array='test1' WHERE email='$userEmail'");
              
              if($update_password_query) {
                $delete_request = mysqli_query($con, "DELETE FROM resetPassword WHERE code='$code'");
                $password_message = "Heslo bylo úspěšně změněno.<br><br>";
              } else {
                $password_message = "Heslo nemohlo být změněno.<br><br>";
              }

              } else {
                $password_message = "Obě zadaná hesla se musí schodovat!<br><br>";
              }

            }

            //$password_message = "";
            echo "<h4>" . $password_message . "</h4><br>";
            echo "<a href='register.php' class='signup'>Opět se přihlásit</a><br>";

						?>

					</form>

				</div>

			</div>

		</div>

	</div>

	<div id="bg"> </div>

</body>
</html>