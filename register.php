<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<html>
<head>
	<title>Cirkulární projekty | Web pro projekty v Cirkulární ekonomice a Oběhovém hospodářství</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>

</head>
<body>

	<?php

	if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>

	<div class="thewrapped">

		<div style="margin: 1rem auto;">
  			<button class="button" style="background-color: #057705; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 0 auto; cursor: pointer;"><a href="http://obcevkruhu.cz" style="color:#fff;">Zpět na hlavní stránku</a></button>
		</div>

		<div class="login_box">

			<div class="login_header">
				<h1>Cirkulární projekty</h1>
				Přihlaste se nebo se registrujte níže!
			</div>
			<br>
			<div id="first">

				<form action="register.php" method="POST">
					<input id="log_email" type="email" name="log_email" placeholder="Email" value="<?php
					if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					}
					?>" required>
					<br>
					<input id="password" type="password" name="log_password" placeholder="Heslo">
					<br>
					<?php if(in_array("Email nebo heslo nejsou správné<br>", $error_array)) echo  "Email nebo heslo nejsou správné<br>"; ?>
					<input id="signInButton" type="submit" name="login_button" value="Přihlásit se">
					<br>
					<a href="#" id="signup" class="signup">Nemáte účet? Registrovat lze zde!</a>

				</form>

			</div>

			<div id="second">

				<form action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php
					if(isset($_SESSION['reg_fname'])) {
						echo $_SESSION['reg_fname'];
					}
					?>" required>
					<br>
					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>




					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php
					if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					}
					?>" required>
					<br>
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

					<input type="email" name="reg_email" placeholder="Email" value="<?php
					if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					}
					?>" required>
					<br>

					<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
					if(isset($_SESSION['reg_email2'])) {
						echo $_SESSION['reg_email2'];
					}
					?>" required>
					<br>
					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
					else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>


					<input type="password" name="reg_password" placeholder="Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>
					<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters and include one or more characters.<br>"; ?>


					<input type="submit" name="register_button" value="Register">
					<br>

					<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
				</form>
			</div>

		</div>

		<div class="demoUser">
    		<div class="login_header" style="background:coral;">
        		<h1>Demo přihlášení</h1>
    		</div>
    		<div>
				<p><strong>Email:</strong> <span id="userDemoEmail">demo@uzivatel.cz</span></p>
				<p><strong>Heslo:</strong> <span id="userDemoEmail">Demo123456</span></p>
				<p> <button type="button" class="btn btn-success" onclick="userDemoAccount();"> Použít demo účet </button> </p>
			</div>
		</div>

	</div>

	<script>
	function userDemoAccount() {
		let demoUserName = document.querySelector("#userDemoEmail").innerText;
		let demoPassWord = document.querySelector("#userDemoEmail").innerText;
		demoUserName = "demo@uzivatel.cz";
		demoPassWord = "Demo123456";
		document.querySelector("#log_email").value = demoUserName;
    document.querySelector("#password").value = demoPassWord;
	}
	</script>
</body>
</html>