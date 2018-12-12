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
        first div
        -->
        <div class="formular" id="first">

            <form action="register.php" method="POST" class="form-signin">

              <h1 class="h3 mb-3 font-weight-normal"><span class="colortext">Vložte přístupové údaje</span>  |  <span class="link"> <a href="newregisterin.php" id="signup" class="signup">Registrujte se</a></span></h1>
              <div class="row">
                  <div class="col">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="log_email" id="inputEmail" class="form-control" placeholder="Email"
                    value="<?php
                    if(isset($_SESSION['log_email'])) {
                      echo $_SESSION['log_email'];
                    }
                    ?>" required autofocus="">
                  </div>
                  <div class="col">
                    <label for="inputPassword" class="sr-only">Heslo</label>
                    <input type="password" name="log_password" id="inputPassword" class="form-control" placeholder="Heslo" required="">

                    <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>

                  </div>
              </div>

              <div class="checkbox mb-3">

                <label>
                  <input type="checkbox" value="remember-me"> <span class="colortext">Zapamatuj si mě</span>
                </label>

                  <span class="link"> | <a href="#">Zapomenuté heslo</a></span>

              </div>
              <input type="submit" name="login_button" value="Příhlásit se" class="btn btn-lg btn-primary btn-block">
              <!--
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              -->
            </form>
          </div>

          <!--
          second div deleted
          -->



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
