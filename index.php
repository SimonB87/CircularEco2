<?php
include("includes/head_designed_htmlhead.php");

?>

</head>
<body>

<?php
include("includes/head_designed_pageheader.php");

/*destroy all the log ins after refresh
session_destroy();*/

if(isset($_POST['post'])){
	$uploadOk = 1;
$imageName = $_FILES['fileToUpload']['name'];
$errorMessage = "";

if($imageName != "") {
	$targetDir = "assets/images/posts/";
	$imageName = $targetDir . uniqid() . basename($imageName);
	$imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

	if($_FILES['fileToUpload']['size'] > 10000000) {
		$errorMessage = "Sorry your file is too large";
		$uploadOk = 0;
	}

	if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
		$errorMessage = "Sorry, only '.jpeg', '.jpg' and '.png' files are allowed";
		$uploadOk = 0;
	}

	if($uploadOk) {
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
			//image uploaded okay
		}
		else {
			//image did not upload
			$uploadOk = 0;
		}
	}

}
if($uploadOk) {
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none', $imageName);
} else {
	echo "<div class='alert alert-danger' style='text-align: center;'>
		$errorMessage
	</div>";
}

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
						echo "Příspěvky: " . $user['num_posts'] . "<br>";
						echo "Lajky: " . $user['num_likes'];
						?>
					</div>
			</div>

				<div class="col-xs-12 col-sm-6 col-md-12 user_details_trends column">
					<h4>Populární témata</h4>
					<div class="trends">
							<?php
								$query = mysqli_query($con, "SELECT * FROM trends ORDER BY hits DESC LIMIT 9");
								foreach ($query as $row) {
									$word = $row['title'];
									$word_dot = strlen($word) >= 14 ? "..." : "";

									$trimmed_word = str_split($word, 14);
									$trimmed_word = $trimmed_word[0];

									echo "<div style='padding: 1px'>";
									echo $trimmed_word . $word_dot;
									echo "<br></div>";

								}

							?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">

			<form class="post_form" action="index.php" method="POST" enctype="multipart/form-data">

				<textarea name="post_text" id="post_text"  placeholder="Máte něco na sdílení?"></textarea>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" name="post" value="PŘIDAT">
				<hr>

			</form>

			<?php
			/* deleted old posts
			$post = new Post($con, $userLoggedIn);
			$post->loadPostsFriends();
			*/
			?>

			<!-- loading gif animation-->
			<div class="posts_area"></div>
			<img id="loading" src="assets/images/loading.gif">

		</div>



		<script>
		var userLoggedIn = '<?php echo $userLoggedIn; ?>';
		$(document).ready(function() {
			$('#loading').show();
			//Original ajax request for loading first posts
			$.ajax({
				url: "includes/handlers/ajax_load_posts.php",
				type: "POST",
				data: "page=1&userLoggedIn=" + userLoggedIn,
				cache:false,

				success: function(data) {
					$('#loading').hide();
					$('.posts_area').html(data);
				}
			});

			$(window).scroll(function() {
				var height = $('.posts_area').height(); //Div containing posts
				var scroll_top = $(this).scrollTop();
				var page = $('.posts_area').find('.nextPage').val();
				var noMorePosts = $('.posts_area').find('.noMorePosts').val();

				if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
					$('#loading').show();

					var ajaxReq = $.ajax({
						url: "includes/handlers/ajax_load_posts.php",
						type: "POST",
						data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
						cache:false,

						success: function(response) {
							$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
							$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage

							$('#loading').hide();
							$('.posts_area').append(response);
						}
					});
				} //End if
				return false;
			}); //End (window).scroll(function())
		});
		</script>

	</div> <!-- closing of the wrapper div, this div stars in the included header file-->
	</div> <!-- closing of div.background-seeThrough -->
</div> <!-- closing of div.background -->

</body>
</html>
