<!-- Included PHP files with probably here or in the body section -->
<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Notification.php");

if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  </head>

  <body>

    <style type="text/css">

      *{
        font-family: Arial, Helvetica, sans-serif;
        padding: 2px;
      }

      body {
        background: transparent;
      }

      input.comment_like {
        color: #e5b896;
        background-color: rgba(27, 31, 34, 0.85);
        border: none;
        padding-top: 2px;
        text-decoration: none;
      }

      .like_value{
        color: #fff;
      }

      form {
        position: absolute;
        top: -4px;
      }

    </style>


    <!-- Otherwise include the PHP files here from above of this file -->
    <?php
    if(isset($_GET['post_id'])) {
      $post_id = $_GET['post_id'];
    }

    $get_likes = mysqli_query($con, "SELECT likes, added_by FROM posts WHERE id='$post_id'");
    $row = mysqli_fetch_array($get_likes);
    $total_likes = $row['likes'];
    $user_liked = $row['added_by'];

    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user_liked'");
    $row = mysqli_fetch_array($user_details_query);
    $total_user_likes = $row['num_likes'];

    //Like button
    if(isset($_POST['like_button'])) {
      $total_likes++;
      $query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
      $total_user_likes++;
      $user_likes = mysqli_query($con, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
      $insert_user = mysqli_query($con, "INSERT INTO likes VALUES('', '$userLoggedIn', '$post_id')");

      //Insert notification  (complete the code in future).
			if($user_liked != $userLoggedIn) {
				$notification = new Notification($con, $userLoggedIn);
				$notification->insertNotification($post_id, $user_liked, "like");
			}

    }
    //Unlike button
    if(isset($_POST['unlike_button'])) {
      $total_likes--;
      $query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
      $total_user_likes--;
      $user_likes = mysqli_query($con, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
      $insert_user = mysqli_query($con, "DELETE FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");

      //Insert notification  (complete the code in future).

    }

    //Check for previous likes
    $check_query = mysqli_query($con, "SELECT * FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
    $num_rows = mysqli_num_rows($check_query);

    if($num_rows > 0) {
      echo '<form action="like.php?post_id=' . $post_id . '" method="POST" style="min-width: 30rem;">
              <input type="submit" class="comment_like" name="unlike_button" value="Dát ♥">
              <span class="like_value">
                '. $total_likes . ' počet ♥
              </span>
            </form>
       ';
    }
    else {
      echo '<form action="like.php?post_id=' . $post_id . '" method="POST" style="min-width: 30rem;">
              <input type="submit" class="comment_like" name="like_button" value="Odebrat ♥ ">
              <span class="like_value">
                '. $total_likes . ' počet ♥
              </span>
            </form>
       ';
    }

    ?>

  </body>
</html>
