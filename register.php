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
	<div id="wrapper" class="registerBody">

		<div class="thewrapped">

			<div style="margin: 1rem auto;">
					<button class="button" style="background-color: #e5b896; border: none; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 0 auto; cursor: pointer;"><a href="http://obcevkruhu.cz" style="color:#000;">Zpět na hlavní stránku</a></button>
			</div>

			<div class="login_box">

				<div class="login_header">
					<h1>Obcevkruhu.cz</h1>
					<h3>Modul sociální sítě</h3>
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
						<?php if(in_array("Email nebo heslo nejsou správné<br>", $error_array)) echo "<p class='registration_error'>Email nebo heslo nejsou správné</p>"; ?>
						<input id="signInButton" type="submit" name="login_button" value="Přihlásit se">
						<br>
						<a href="#" id="signup" class="signup">Nemáte účet? Registrovat lze zde!</a>
						<br>
						<a href="newPassword.php" id="forgotPassword" class="signup">Obnovení zapomenutého hesla</a>
					</form>

				</div>

				<div id="second">

					<form action="register.php" method="POST">
						<input type="text" name="reg_fname" placeholder="Jméno" value="<?php
						if(isset($_SESSION['reg_fname'])) {
							echo $_SESSION['reg_fname'];
						}
						?>" required>
						<br>
						<?php if(in_array("Vaše jméno musí mít mezi 2 a 25 znaky<br>", $error_array)) echo "<p class='registration_error'>Vaše jméno musí mít počet znaků 2 až 25</p>"; ?>

						<input type="text" name="reg_lname" placeholder="Příjmení" value="<?php
						if(isset($_SESSION['reg_lname'])) {
							echo $_SESSION['reg_lname'];
						}
						?>" required>
						<br>
						<?php if(in_array("Vaše příjmení musí mít mezi 2 a 25 znaky<br>", $error_array)) echo "<p class='registration_error'>Vaše příjmení musí mít počet znaků 2 až 25</p>"; ?>

						<input type="email" name="reg_email" placeholder="Email" value="<?php
						if(isset($_SESSION['reg_email'])) {
							echo $_SESSION['reg_email'];
						}
						?>" required>
						<br>

						<input type="email" name="reg_email2" placeholder="Ověřit email" value="<?php
						if(isset($_SESSION['reg_email2'])) {
							echo $_SESSION['reg_email2'];
						}
						?>" required>
						<br>
						<?php if(in_array("Email je již využíván<br>", $error_array)) echo "<p class='registration_error'>Email je již užíván</p>";
						else if(in_array("Email nemá validní formát <br>", $error_array)) echo "<p class='registration_error'>email nemá validní formát</p>";
						else if(in_array("Emaily nejsou stejné<br>", $error_array)) echo "<p class='registration_error'>Emaily se neshodují</p>"; ?>


						<input type="password" name="reg_password" placeholder="Heslo" required>
						<br>
						<input type="password" name="reg_password2" placeholder="Ověřit heslo" required>
						<br>
						<?php if(in_array("Hesla neodpovídají<br>", $error_array)) echo "<p class='registration_error'>Vaše hesla se neshodují</p>";

						else if(in_array("Vaše hesla mohou obsahovat jen písmena bez diakritiky a celá čísla<br>", $error_array)) echo "<p class='registration_error'>Vaše heslo může obsahovat jen znaky bez diakritiky a čísla</p>";
						else if(in_array("Vaše heslo musí být mezi 5 a 30 znaky<br>", $error_array)) echo "<p class='registration_error'>Vaše heslo musí mít od 5 do 30 znaků.</p>"; ?>


						<input type="submit" name="register_button" value="Registrovat">
						<br>

						<?php if(in_array("<span style='color: #14C800;'>Jste připraven/a! Nyní se můžete přihlásit!</span><br>", $error_array)) echo "<span style='color: #14C800;'>Vše je připraveno! Můžete se přihlásit!</span></p>"; ?>
						<a href="#" id="signin" class="signup">Již máte účet? Vstupte zde!</a>
					</form>
				</div>

			</div>

			<div class="demoUser">
					<div class="login_header">
							<h1>Demo přihlášení</h1>
					</div>
					<div>
					<p class="text-center"><strong>Email:</strong> <span id="userDemoEmail">demo@uzivatel.cz</span></p>
					<p class="text-center"><strong>Heslo:</strong> <span id="userDemoEmail">Demo123456</span></p>
					<p class="text-center"> <button type="button" class="btn btn-reload" onclick="userDemoAccount();"> Použít demo účet </button> </p>
				</div>
			</div>

		</div>

	</div>

	<div id="bg"> </div>

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