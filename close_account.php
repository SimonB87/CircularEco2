<?php
include("includes/head_designed_htmlhead.php");

?>
<title>Odhlásit účet | Obce v kruhu.cz</title>
</head>
<body>

<?php
include("includes/head_designed_pageheader.php");

if(isset($_POST['cancel'])){
  header("Location: settings.php");
}

if(isset($_POST['close_account'])){
  $close_query = mysqli_query($con, "UPDATE users SET user_closed='yes' WHERE username='$userLoggedIn'");
  session_destroy();//to log out the user
  header("Location: register.php");
}


?>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">
  <h4>Close Account</h4>
  Are you really sure, you want to close your account?<br><br>
  When you close your account, your profile and activity will be hidden from all users. The data is still stored in database.<br><br>
  You can reopen your account at any time by simply loggin in.<br><br>
  <form action="close_account.php" method="POST">
    <input type="submit" name="close_account" id="close_account" class="danger settings_submit" value="Yes, close my account.">
    <input type="submit" name="cancel" id="update_details" class="info settings_submit" value="No, keep my account.">
  </form>

</div>
