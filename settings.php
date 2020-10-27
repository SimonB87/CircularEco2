<?php
include("includes/header.php");
include("includes/form_handlers/settings_handler.php");
?>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">

<?php
  $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
  $row = mysqli_fetch_array($user_data_query);
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $userRole = $row['userRole'];

  if ($userRole === "super") {
    echo "<div><a href='manage.php'><button type= 'button' class='btn btn-primary' style= 'margin-bottom: 1.5rem;' > Sekce pro administrátora </button> </a>" .
    "<a href='manageUserSubmissions.php'><button type='button' class='btn btn-info' style='margin-bottom: 1.5rem;'> Správa mých podaných projektů </button> </a></div>";
  } else {
    echo "<div><span> &nbsp; </span><a href='manageUserSubmissions.php'><button type='button' class='btn btn-info' style='margin-bottom: 1.5rem;'> Správa mých podaných projektů </button> </a></div>";
  }
  ?>

  <h4>Account Settings</h4>
  
  <?php
  echo "<img src='" . $user['profile_pic'] ."' id='small_profile_pic'>";
  ?>

  <br>
  <a href="upload.php">Upload new profile picture.</a>
  <br><br><br>

  <h4>Modify the values and click 'Update Details'</h4>

  <form class="" action="settings.php" method="POST">
    <p class="settingspara">First name: <input type="text" name="first_name" value="<?php echo $first_name; ?>" id="settings_input_first_name" class="settingsin"></p><br>
    <p class="settingspara">Last name: <input type="text" name="last_name" value="<?php echo $last_name; ?>" id="settings_input_last_name" class="settingsin"></p><br>
    <p class="settingspara">Email: <input type="text" name="email" value="<?php echo $email; ?>" id="settings_input_email" class="settingsin"></p><br>

    <?php echo $message; ?>

    <input type="submit" name="update_details" id="save_details" value="Update Details" class="info settings_submit"><br>
  </form>

  <h4>Change password</h4>
  <form class="" action="settings.php" method="POST">
    <p class="settingspara">Old password: <input type="password" name="old_password" id="settings_input_old_password" class="settingsin"></p><br>
    <p class="settingspara">New password: <input type="password" name="new_password_1" id="settings_input_new_password_1" class="settingsin"></p><br>
    <p class="settingspara">Varify new password: <input type="password" name="new_password_2" id="settings_input_new_password_2" class="settingsin"></p><br>
    <?php echo $password_message; ?>
    <input type="submit" name="update_password" id="save_password" value="Update Password" class="info settings_submit"><br>
  </form>

  <h4>Close Account</h4>
  <form class="" action="settings.php" method="POST">
    <input type="submit" name="close_account" id="close_account" value="Close Account" class="danger settings_submit">
  </form>
</div>
