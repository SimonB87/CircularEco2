<?php
include("includes/head_designed_htmlhead.php");
?>
<link rel="stylesheet" href="assets/css/formElementsStyle2019.css">

<title>Zprávy a korespondence | Obce v kruhu.cz</title>
</head>
<body>

<?php
include("includes/head_designed_pageheader.php");

$message_obj = new Message($con, $userLoggedIn);

if(isset($_GET['u']))
	$user_to = $_GET['u'];
else {
	$user_to = $message_obj->getMostRecentUser();
	if($user_to == false)
		$user_to = 'new';
}

if($user_to != "new")
	$user_to_obj = new User($con, $user_to);

	if(isset($_POST['post_message'])) {
					//first check if the post has text inside of it.
		if(isset($_POST['message_body'])) {
			$body = mysqli_real_escape_string($con, $_POST['message_body']);
			$date = date("Y-m-d H:i:s");
			$message_obj->sendMessage($user_to, $body, $date);
		}
	}

?>

<!-- show profile picture-->
<div class="col-md-3 col-xs-12 user_details user_details_profile">
	<div class="row user_details_row">
			<div class="col-xs-12 col-sm-6 col-md-12 column text-center">
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

		<div class="col-xs-12 col-sm-6 col-md-12 text-center column" id="conversations">
	 		 <h4>Conversations</h4>

	 		 <div class="loaded_conversations">
	 			 <?php echo $message_obj->getConvos(); ?>
	 		 </div>
	 		 <br>
	 	 <!-- a link to a new message-->
	 	 <a href="messages.php?u=new">New Message</a>

	  </div>

	</div>
</div>

 <div class="col-md-8 col-xs-12 col-md-push-1 main_column column" id="main_column">
   <?php
   if($user_to != "new") {
     echo "<h4>You and <a href='$user_to'>" . $user_to_obj->getFirstAndLastName() . "</a></h4><hr><br>";
		 echo "<div class='loaded_messages' id='scroll_messages'>";
		 echo $message_obj->getMessages($user_to);
		 echo "</div>";
	 } else {
		 echo "<h4>New Message</h4>";
	 }
   ?>

	 <div class="message_post">
		 <form action="" method="POST">
			 <?php
			 if($user_to == "new") {
				 echo "Vyberte přítele, kterému chcete poslat zprávu: <br>";
				 ?>
				 
				 <div class='fields'><div class='field full'>
				 	<label for="seach_text_input">
				 	<input type='text' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' name='q' placeholder='Name' autocomplete='off' id='seach_text_input'>
				</div></div>

				 <?php
				 echo "<div class='results'></div>";
			 }
			 else {
				 echo "<div class='fields'><div class='field full'>".
							 "<textarea name='message_body' id='message_textarea' placeholder='Napište svou zprávu ...'></textarea>".
							 "</div></div>";
				 echo "<div class='fields'><div class='field full'>".
							 "<input type='submit' name='post_message' class='info' id='message_submit' value='Odeslat'>".
							 "</div></div>";
			 }

			 ?>
		 </form>

	 </div>

	 <script>
			 var div = document.getElementById("scroll_messages");

			 if(div != null) {
					 div.scrollTop = div.scrollHeight;
			 }//There was a bug, that was corrected oonly in QnA answer.
	 </script>

 </div>
