<?php
include("includes/head_designed_htmlhead.php");
?>
<link rel="stylesheet" href="assets/css/formElementsStyle2019.css">
<title>Uživatelská nastavení | Obce v kruhu.cz</title>
</head>
<body>

<?php
include("includes/head_designed_pageheader.php");

include("includes/form_handlers/settings_handler.php");
?>

<!-- show profile picture-->
<div class="col-md-2 col-xs-12 user_details user_details_profile mySearchTable_user_details">
  <div class="row user_details_row">
      <div class="col-xs-12 col-sm-6 col-md-12 text-center column">
        <a href="<?php echo $userLoggedIn; ?>"><img src="<?php echo $user['profile_pic']; ?>" alt="profile pic"></a>
        <div class="user_details_left_right">

        <!-- show profile name-->
        <a href="<?php echo $userLoggedIn; ?>">
        <?php
        echo $user['first_name'] . " " . $user['last_name'];
        ?>
        </a>
        <!-- show number of profile posts-->
        <br>
        <?php
            echo "Posty: " . $user['num_posts'] . "<br>";
            echo "Lajky: " . $user['num_likes'];
        ?>
        </div>
    </div>
  </div>
</div>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column" id="main_column">

<?php
  $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
  $row = mysqli_fetch_array($user_data_query);
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $userRole = $row['userRole'];

  if ($userRole === "super") {
    echo "<div><a href='manage.php'><button type= 'button' class='btn btn-primary' style= 'margin-bottom: 1.5rem;' > Administrace příkladů <i class='fas fa-user-tie'></i> </button> </a>";
  } 
  echo "<a href='manageUserSubmissions.php'><button type='button' class='btn btn-info' style='margin-bottom: 1.5rem;'> Mé podané příklady <i class='far fa-edit'></i> </button> </a></div>";
  ?>

  <h1 class="paddingTopBottom_big">Nastavení účtu</h1>
  <h3 class="paddingTopBottom_small">Profilový obrázek</h3>
  
  <?php
  echo "<img src='" . $user['profile_pic'] ."' id='small_profile_pic'>";
  ?>

  <br>
  <a class="paddingBottom_big" href="upload.php">Nahrát nový profilový obrázek.</a>
  <br><br><br>

  <h3 class="paddingTopBottom_big">Uživatelské údaje</h3>

  <em class="paddingTopBottom_medium">Pozn.: Upravte hodnoty a pak potvrďte tlačítem "Aktualizovat údaje"</em>

  <form class="paddingBottom_big" action="settings.php" method="POST">

    <div class="fields">

      <div class="field half">
        <label for="settings_input_first_name">Jméno:</label>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>" id="settings_input_first_name" class="">
      </div>

      <div class="field half">
        <label for="settings_input_last_name">Příjmení:</label>
        <input type="text" name="last_name" value="<?php echo $last_name; ?>" id="settings_input_last_name" class="">
      </div>

      <div class="field half"> 
        <label for="settings_input_email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>" id="settings_input_email" class="">
      </div>

    </div>

<!--     <p class="settingspara">First name: <input type="text" name="first_name" value="<?php /*echo $first_name;*/ ?>" id="settings_input_first_name" class="settingsin"></p>

    <p class="settingspara">Last name: <input type="text" name="last_name" value="<?php /*echo $last_name; */?>" id="settings_input_last_name" class="settingsin"></p>

    <p class="settingspara">Email: <input type="text" name="email" value="<?php /*echo $email;*/ ?>" id="settings_input_email" class="settingsin"></p> -->

    <div class="field half">
      <?php echo $message; ?>
    </div>

    <div class="field half">
      <input type="submit" name="update_details" id="save_details" value="Aktualizovat údaje" class="info settings_submit"><br>
    </div>

  </form>

  <h3 class="paddingTopBottom_big">Změnit heslo</h3>
  
    <form class="" action="settings.php" method="POST">
      <div class="fields">
      <div class="field half"> 
        <label for="settings_input_old_password">Old password:</label>
        <input type="password" name="old_password" id="settings_input_old_password" class="settingsin">
      </div>
      <div class="field half"> 
        <label for="settings_input_new_password_1">New password: </label>
        <input type="password" name="new_password_1" id="settings_input_new_password_1" class="settingsin">
      </div>
      <div class="field half"> 
        <label for="settings_input_new_password_2">New password: </label>
        <input type="password" name="new_password_2" id="settings_input_new_password_2" class="settingsin">
      </div>
      <div class="field half"> 
        <p><?php echo $password_message; ?></p>
      </div>
      <div class="field half"> 
        <input type="submit" name="update_password" id="save_password" value="Update Password" class="info settings_submit">
      </div>  
      </div>
    </form>
 

  <h3 class="paddingTopBottom_big">Close Account</h3>
  <div class="fields">
    <form class="" action="settings.php" method="POST">
      <div class="field half"> 
        <input type="submit" name="close_account" id="close_account" value="Close Account" class="danger settings_submit">
      </div>
    </form>
  </div>
</div>
