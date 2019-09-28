<?php
include("includes/header.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}
?>

<!-- show profile picture-->
<div class="col-md-3 col-xs-12 user_details user_details_profile">
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
        echo "Posts: " . $user['num_posts'] . "<br>";
        echo "Likes: " . $user['num_likes'];
        ?>
        </div>
    </div>
  </div>
</div>

<div class="col-md-8 col-md-push-1 col-xs-12 main_column column" id="main_column">
  <div class="posts_area">
    <?php
      $post = new Post($con, $userLoggedIn);
      $post->getSinglePost($id);
    ?>
  </div>
</div>
