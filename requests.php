<?php
include("includes/head_designed_htmlhead.php");

?>

</head>
<body>

<?php
include("includes/head_designed_pageheader.php");
?>

<!-- show profile picture-->
<div class="col-md-2 col-xs-12 user_details user_details_profile">
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

<div class="col-md-9 col-xs-12 col-md-push-1 main_column column text-center" id="main_column">
  <h4>Friend Requests</h4>

  <?php

$query = mysqli_query($con, "SELECT * FROM friend_requests WHERE user_to='$userLoggedIn'");
if(mysqli_num_rows($query) == 0)
  echo "You have no friend requests at this time!";
else {

  while($row = mysqli_fetch_array($query)) {
    $user_from = $row['user_from'];
    $user_from_obj = new User($con, $user_from);

    echo $user_from_obj->getFirstAndLastName() . " sent you a friend request!";

    $user_from_friend_array = $user_from_obj->getFriendArray();

    if(isset($_POST['accept_request' . $user_from ])) {
      $add_friend_query = mysqli_query($con, "UPDATE users SET friend_array=CONCAT(friend_array, '$user_from,') WHERE username='$userLoggedIn'");
      $add_friend_query = mysqli_query($con, "UPDATE users SET friend_array=CONCAT(friend_array, '$userLoggedIn,') WHERE username='$user_from'");

      $delete_query = mysqli_query($con, "DELETE FROM friend_requests WHERE user_to='$userLoggedIn' AND user_from='$user_from'");
      echo "You are now friends!";
      header("Location: requests.php");
    }

    if(isset($_POST['ignore_request' . $user_from ])) {
      $delete_query = mysqli_query($con, "DELETE FROM friend_requests WHERE user_to='$userLoggedIn' AND user_from='$user_from'");
      echo "Request ignored!";
      header("Location: requests.php");
    }

    ?>
    <form action="requests.php" method="POST">
      <input type="submit" name="accept_request<?php echo $user_from; ?>" id="accept_button" value="Accept">
      <input type="submit" name="ignore_request<?php echo $user_from; ?>" id="ignore_button" value="Ignore">
    </form>
    <?php


  }

}

?>


</div>
