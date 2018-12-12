<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Cirkularní Projekty</title>

    <!-- fontawesome.com icons -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- Bootstrap core CSS -->
    <link href="registerfile/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="registerfile/cover.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function() {

    	//On click signup, hide login and show registration form
    	$("#signup").click(function() {
    		$("#first").slideUp("slow", function(){
    			$("#second").slideDown("slow");
    		});
    	});

    	//On click signup, hide registration and show login form
    	$("#signin").click(function() {
    		$("#second").slideUp("slow", function(){
    			$("#first").slideDown("slow");
    		});
    	});


    });

    </script>

  </head>

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

  <body class="text-center fullpage">
    <div class="insidepage">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand colortext"><img class="mb-4 pagelogo" src="registerfile/circlogo.png" alt="" width="30" height="30"> Circularní Projekty</h3>

          <!--
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Contact</a>
          </nav>
          -->

        </div>
      </header>

      <main role="main" class="inner cover">
        <!--
        first div deleted
        -->


          <!--
          second div
          -->
          <div class="formular" id="second">
            <h2 class="h3 mb-3 font-weight-normal"><span class="colortext">Registrační formulář</span></h2>
    				<form action="register.php" method="POST">

              <div class="row">

                <div class="col">
        					<input type="text" name="reg_fname" placeholder="First Name"  value="<?php
        					if(isset($_SESSION['reg_fname'])) {
        						echo $_SESSION['reg_fname'];
        					}
        					?>" class="form-control" required>

    					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
              </div>


                <div class="col">
        					<input type="text" name="reg_lname" placeholder="Last Name"  class="form-control" value="<?php
        					if(isset($_SESSION['reg_lname'])) {
        						echo $_SESSION['reg_lname'];
        					}
        					?>" required>
                </div>

    					<br>
    					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
              </div>
              <br>

              <div class="row">

                <div class="col">

    					<input type="email" name="reg_email" placeholder="Email"  class="form-control" value="<?php
    					if(isset($_SESSION['reg_email'])) {
    						echo $_SESSION['reg_email'];
    					}
    					?>" required>

                </div>

                <div class="col">

    					<input type="email" name="reg_email2" placeholder="Confirm Email"  class="form-control" value="<?php
    					if(isset($_SESSION['reg_email2'])) {
    						echo $_SESSION['reg_email2'];
    					}
    					?>" required>
    					<br>
    					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
    					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
    					else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>

                </div>

              </div>

              <div class="row">


                <div class="col">
    					    <input type="password" name="reg_password" placeholder="Password"  class="form-control" required>
                </div>

                <div class="col">
        					<input type="password" name="reg_password2" placeholder="Confirm Password"  class="form-control" required>
        					<br>
        					<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
        					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
        					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
                </div>
              </div>

              <br>

    					<input type="submit" name="register_button" class="btn btn-lg btn-primary" value="Registrovat">
    					<br>

    					<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
    					<a href="newregister.php" id="signin" class="signin">Již máte účet? Vstupte zde!</a>
    				</form>
    			</div>


      </main>

      <footer class="mastfoot mt-auto">
        <div class="container row text-left">
            <div class="col">
              <h4 class="headline">Unikání ekologická řešení</h4><h4>
            </h4></div>
            <div class="col">
              <h4 class="headline">Naše Expertiza</h4><h4>
            </h4></div>
        </div>

        <div class="container row">
          <div class="col">
            <ul>
              <li class="ulText">Biologický odpad</li>
              <li class="ulText">Textilní odpad</li>
              <li class="ulText">Stavební odpad</li>
              <li class="ulText">a další</li>
            </ul>

          </div>

        <div class="col column">

          <div class="col">
            <span class="">
              <i class="fas fa-handshake iconic"></i>
              Úspěšné projekty
            </span>
          </div>

          <div class="col">
            <span class="">
              <i class="fas fa-money-bill-alt iconic"></i>
              Úspora nákladů
            </span>
          </div>

          <div class="col">
            <span class="">
              <i class="far fa-compass iconic"></i>
              Podpora manažerů
            </span>
          </div>

        </div>


        </div>

        <div class="inner footback">
          <p class="mt-5 mb-3">© 2018 <a href="http://www.simonburyan.cz/port" class="link">Šimon Buryan</a></p>
        </div>
      </footer>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="registerfile/jquery-3.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="registerfile/popper.js"></script>
    <script src="registerfile/bootstrap.js"></script>

</body></html>
