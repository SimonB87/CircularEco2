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

  <style>
  .wrapper {
    overflow-y: scroll;
  }
  </style>

</head>
<body>

	<div id="wrapper" class="wrapper"> 

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

					<form action="newpassword.php" method="POST">
						<input id="email" type="email" name="email" placeholder="Email" autocomplete="off" value="<?php
						if(isset($_SESSION['log_email'])) {
							echo $_SESSION['log_email'];
						}
						?>" required>
						<br>
						
						<input id="submit" type="submit" name="submit" value="Odeslat email">
						<br>

						<?php 
						/*
						* Add PHP Mailer
						*/

						require 'PHPMailer/src/Exception.php';
						require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';
            require "config/config_password.php";

						// Import PHPMailer classes into the global namespace
						// These must be at the top of your script, not inside a function
						use PHPMailer\PHPMailer\PHPMailer;
						use PHPMailer\PHPMailer\SMTP;
						use PHPMailer\PHPMailer\Exception;

            if(isset($_POST["email"])) {

              $emailTo = strip_tags($_POST["email"]);

              //generate a request ID for new password
              $code = uniqid(true);

              //Select columns named from "a" to "e" from a database
              $findUser = "SELECT email FROM users WHERE email='$emailTo'";

              //variable to catch the results
              $results = $con -> query($findUser);
              //function to fatch the data
              if ($results-> num_rows > 0 ) {

                $query = mysqli_query($con_password, "INSERT INTO resetPassword(code, email) VALUES('$code', '$emailTo')");
                if(!$query){
                  exit("<h4 style='color:coral;'>Nastala chyba při zpracování požadavku.</h4>");
                }

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //edit character set in email
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    //$mail->isSMTP();                                            // Send using SMTP
                    $mail->CharSet    = 'UTF-8';
                    $mail->Host       = 'w223948@hc1-wd54.wedos.net';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'spravce@obcevkruhu.cz';                     // SMTP username
                    $mail->Password   = $con_password_forEmail;                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('spravce@obcevkruhu.cz', 'Správce - obcevkruhu.cz');
                    $mail->addAddress($emailTo);     // Add a recipient
                    $mail->addReplyTo('no-reply@obcevkruhu.cz', 'No-reply - obcevkruhu.cz');

                    // Content
                    $url_link = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code"; 
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Obcevkruhu.cz - Požadavek na obnovu hesla';
                    $mail->Body    = "<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'>" .
                    "<p>Krásný den, </p>" .
                    "<p>požadovali jste nové heslo pro platformu www.obcevkruhu.cz.</p>" . 
                    "<p>Použijte <a href='$url_link'>odkaz pro obnovu </a></p>" . 
                    " </div><br>";
                    $mail->AltBody = "Krásný den," . "požadovali jste nové heslo pro platformu www.obcevkruhu.cz." . "Použijte odkaz: $url_link pro obnovu </a></p>"; 

                    $mail->send();

                    echo '<h4 style="color:lightgreen;">Obcevkruhu.cz - email pro obnovu zaslán. Zkontrolujte si došlé zprávy v zadané emailové schránce.</h4>';

                } catch (Exception $e) {
                    echo "<h4 style='color:coral;'>Obcevkruhu.cz - zpráva s obnovením nemohla být odeslána. Došlo k chybě: {$mail->ErrorInfo}</h4>";
                }

              } else {
                echo "<h4 style='color:coral;'>Obcevkruhu.cz - Uživatel nenalezen. Použijte <i>platný</i> email, který je již registrován na platformě.</h4>";
              }
            }
						?>

					</form>

				</div>

			</div>

		</div>

	</div>

	<div id="bg"> </div>

</body>
</html>