<?php
include("includes/head_designed_htmlhead.php");

?>


<?php


$message_obj = new Message($con, $userLoggedIn);

/*destroy all the log ins after refresh

session_destroy();*/


if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username ='$username'");
	$user_array = mysqli_fetch_array($user_details_query);
	$userEmail = $user_array['email'];

	$num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}

if(isset($_POST['remove_friend'])) {
	$user = new User($con, $userLoggedIn);
	$user->removeFriend($username);
}

if(isset($_POST['add_friend'])) {
	$user = new User($con, $userLoggedIn);
	$user->sendRequest($username);
}

if(isset($_POST['respond_request'])) {
	header("Location: requests.php");
}

if(isset($_POST['post_message'])) {
	if(isset($_POST['message_body'])) {
		$body = mysqli_real_escape_string($con, $_POST['message_body']);
		$date = date("Y-m-d H:i:s");
		$message_obj->sendMessage($username, $body, $date);
	}

	$link = '#profileTabs a[href="#messages_div"]';

	echo "<script>
		$(function (){
			$('" . $link ."').tab('show');
		});
	</script>";

}
?>

<title>Profil - <?php echo $username; ?> | Obce v kruhu.cz</title>
<link rel="stylesheet" href="assets/css/formElementsStyle2019.min.css">

</head>
<body>

<?php
include("includes/head_designed_pageheader.php");
?>

  

	<style media="screen">
		.wrapper {
			margin-left: 0px;
			padding-left: 0px;
		}
	</style>

<div class="row">

		<div class="profile__item profile_left col-md-2 col-xs-6">
			<img src="<?php echo $user_array['profile_pic']; ?>">

			<div class="profile_info">
				<p><?php echo "Příspěvky: " . $user_array['num_posts'];?></p>
				<p><?php echo "Lajky: " . $user_array['num_likes'];?></p>
				<p><?php echo "Spojení: " . $num_friends; ?></p>
			</div>

			<form action="<?php echo $username; ?>" class="" method="POST">
				<?php
				$profile_user_obj = new User($con, $username);
				if($profile_user_obj->isClosed()) {
					header("Location: user_closed.php");
				}

				$logged_in_user_obj = new User($con, $userLoggedIn);

				if($userLoggedIn != $username) {

					if($logged_in_user_obj->isFriend($username)) {
						echo '<input type="submit" name="remove_friend" class="danger" value="Ostranit z přátel"><br>';
					}
					else if ($logged_in_user_obj->didReceiveRequest($username)) {
						echo '<input type="submit" name="respond_request" class="warning" value="Odpovědět na požadavek"><br>';
					}
					else if ($logged_in_user_obj->didSendRequest($username)) {
						echo '<input type="submit" name="" class="default" value="Požadavek zaslán"><br>';
					}
					else
						echo '<input type="submit" name="add_friend" class="success" value="Přidat uživatele"><br>';

				}


				?>

			</form>

			<input type="submit" class="deep_blue" data-toggle="modal" data-target="#post_form" value="Pošlete vzkaz">

			<?php
			if($userLoggedIn != $username) {

				echo '<div class="profile_info_bottom text-center">';
					echo "Společných přátel: " . $logged_in_user_obj->getMutualFriends($username);
						echo '</div>';
			}

			?>

		</div>


		<div class="col-md-8 col-xs-12 col-md-push-1 main_column column profile__item" id="main_column">

			<ul class="nav nav-tabs" role="tablist" id="profileTabs">
				<li role="presentation" class="active"><a href="#newsfeed_div" aria-controls="newsfeed_div" role="tab" data-toggle="tab">Newsfeed</a></li>
				<li role="presentation"><a href="#about_div" aria-controls="about_div" role="tab" data-toggle="tab">About</a></li>
				<li role="presentation"><a href="#messages_div" aria-controls="messages_div" role="tab" data-toggle="tab">Mesages</a></li>
			</ul>

			<div class="tab-content">

				<div role="tabpanel" class="tab-pane fade in active" id="newsfeed_div">
					<div class="posts_area"></div>
					<img id="loading" src="assets/images/loading.gif">
				</div>

				<div role="tabpanel" class="tab-pane fade" id="about_div"> <!-- About section -->
					<form method="post">

					<?php
					require "config/config_password.php";
					//show current user profile
					$user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
					$row = mysqli_fetch_array($user_data_query);
					$userLoggedInEmail = $row['email'];

 					if (!mysqli_set_charset($con, "utf8")) {
						printf("Error loading character set utf8: %s\n", mysqli_error($con));
						exit();
					} else {
						//printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
					} 

					$getUserProfileQuery = mysqli_query($con, "SELECT * FROM user_profile WHERE email='$userEmail'");

					if(mysqli_num_rows($getUserProfileQuery) === 0 ) {
						echo "<textarea id='user_profile' style='min-height: 5rem;' name='user_profile' placeholder='Uživatel nemá vyplněný profil' maxlength='2500'></textarea>";
					}	else {
						$row = mysqli_fetch_array( $getUserProfileQuery );
						$user_profile = strip_tags( $row['profile'] );
						echo "<textarea id='user_profile' style='min-height: 30vh;' name='user_profile' maxlength='2500'>" . $user_profile . "</textarea>";
					}

					if($userLoggedIn === $username) {
						echo "<input id='submit' type='submit' name='submit' style='border: 0;background-color: rgba(0,0,0,0.25); margin: 1rem 0;' value='Aktualizovat profil'>";
					}

					?>

					<?php
					//hadle profile update 
					if(isset($_POST['user_profile'])) {
					
						$updateUserProfile = strip_tags($_POST['user_profile']);

						$delete_request = mysqli_query($con, "DELETE FROM user_profile WHERE email='$userLoggedInEmail'");

						$progress;

						if(!$delete_request){
							echo "<h4 style='color:coral'>Pozor, nedošlo ke smazání původního záznamu.</h4>";
							echo "Chyba:" . mysqli_error();
							$progress = false;
						} else {
							$progress = true;
						}

						$sqlQuery = "INSERT INTO user_profile (user, email, profile) VALUES ('$userLoggedIn', '$userLoggedInEmail', '$updateUserProfile')";
						$insert_user_profile = mysqli_query($con, $sqlQuery );
						if(!$insert_user_profile) {
							echo "<h4 style='color:coral'>Pozor, profil nemohl být změněn.</h4>";
							echo "Chyba:" . mysqli_error();
							$progress = false;
						} else {
							$progress = true;
						}

						if ($progress) {
							echo "<h4 style='color:lightgreen'>Profil byl upraven. Aktualizujte si stránku.</h4>";
						}

					}
					?>

					</form>
				</div>

				<div role="tabpanel" class="tab-pane fade" id="messages_div"> <!-- 	<div role="tabpanel" class="tab-panel fade in active" id="messages_div">  -->
					<?php

					echo "<h4>You and <a href='" . $username ."'>" . $profile_user_obj->getFirstAndLastName() . "</a></h4><hr><br>";
					echo "<div class='loaded_messages' id='scroll_messages'>";
					echo $message_obj->getMessages($username);
					echo "</div>";

					?>

				<div class="message_post">
					<form action="" method="POST">

							<textarea name='message_body' id='message_textarea' placeholder='Write your message ...'></textarea>
							<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>

					</form>

				</div>

				<script>
						var div = document.getElementById("scroll_messages");

						if(div != null) {
								div.scrollTop = div.scrollHeight;
						}//There was a bug, that was corrected oonly in QnA answer.
				</script>


				</div>

			</div>

	</div> <!-- closing of the wrapper div, this div stars in the included header file-->


	<!-- Modal -->
	<div class="modal fade" id="post_form" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="postModalLabel">Post something!</h4>
				</div>

				<div class="modal-body">
					<p> Toto se ukáže na uživatelově profilu a také na nástěnce s Novinkami, kde to uvidí i Vaši přátelé.</p>

					<form class="profile_post" action="" method="POST">
						<div class="form-group">
							<textarea class="form-control" name="post_body"></textarea>
							<input type="hidden" name="user_from" value="<?php echo $userLoggedIn; ?>">
							<input type="hidden" name="user_to" value="<?php echo $username; ?>">
						</div>
					</form>
				</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" name="post_button" id="submit_profile_post">Post</button>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Infinite scrolling -->
<script>
var userLoggedIn = '<?php echo $userLoggedIn; ?>';
var profileUsername = '<?php echo $username; ?>';
/* Script for loading post animation */
$(document).ready(function(){
	$('#loading').show();

	/*original ajax request for loading first posts.*/
	$.ajax({
		url: "includes/handlers/ajax_load_profile_posts.php",
		type: "POST",
		data: "page=1&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
		cache:false,

		success: function(data) {
			$('#loading').hide();
			$('.posts_area').html(data);
		}
	});
	$(window).scroll(function() {
		var height = $('.posts_area').height(); //Put the height of this as the div cotaining posts.
		var scroll_top = $(this).scrollTop();
		var page = $('.posts_area').find('.nextPage').val();
		var noMorePosts = $('.posts_area').find('.noMorePosts').val();

		if((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false'){
			$('#loading').show();

			/*original ajax request for loading first posts.*/
			var ajaxReq = $.ajax({
				url: "includes/handlers/ajax_load_profile_posts.php",
				type: "POST",
				data: "page=" + page + "&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
				cache:false,

				success: function(response) {
					$('.posts_area').find('.nextPage').remove();//removes current .nextPage
					$('.posts_area').find('.noMorePosts').remove();//
					$('#loading').hide();
					$('.posts_area').append(response);
				}
			});

		}//end if statement.
		return false;
	});//end $(window).scroll(function()
});
</script>



</div> <!-- missing closing div section 9 lesson 85 -->


</body>

</html>

