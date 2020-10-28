<?php
include("includes/head_designed_htmlhead.php");

?>
<title>Kontakt na správce | Obce v kruhu.cz</title>
</head>
<body>

<?php
include("includes/head_designed_pageheader.php");

/*destroy all the log ins after refresh
session_destroy();*/

if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
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
		</div>
  </div>

	<div class="col-md-8 col-xs-12 col-md-push-1 main_column column" id="main_column">

    <div class="developercontact">
      <h1>Ing. Simon Buryan, Ph.D.</h1>
      <img src="http://www.simonburyan.cz/circ8/assets/images/profile_pics/simon.jpg" alt="Ing. Simon Buryan">
      <h3>Project web developer, Project manager</h3>
      <h5 class="text-center"><strong>Contact:</strong></h5>
    </div>

    <div class="row">

      <div class="col-md-6 developertext">
        <p class="strongtext">Address:</p>
        <p>The Institute for Sustainable Business</p>
        <p>Vysoká škola ekonomická v Praze</p>
        <p>Fakulta mezinárodních vztahů</p>
        <p>Nám. W. Churchilla 1938/4</p>
        <p>130 67 Praha 3 – Žižkov</p>
        <p>Místnost: NB032</p>
      </div>

      <div class="col-md-6 developertext">
        <p class="strongtext">Personal Contact:</p>
        <p>simon.buryan{at}vse.cz</p>
        <p>+420 731443262</p>
        <p>NB032</p>
      </div>

      </div>

    </div>
	</div>


</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>
