<?php
include("includes/header.php");

if (isset($_SESSION['username'])) {
  $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
  $row = mysqli_fetch_array($user_data_query);
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $userRole = $row['userRole'];
  
  if ( $userRole === "super" ) {
    echo "<div><h3 style='text-align: center;'>Vítejte v sekci pro správu</h3></div>";
  } else {
    header("Location: index.php");
  }

}
else {
	header("Location: register.php");
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
 
    <div class="col-md-8 col-xs-12 col-md-push-1 main_column column">
      <section>
        <h2>Zaslané projekty od veřejnosti:</h2>
        
        <?php
        //conect to the database
        //old: $conn = mysqli_conect("md54.wedos.net", "a223948_sbforum", "phx5EXKm", "d223948_sbforum");
        //in case of error during conecting to the database display error
        if ($con-> conect_error) {
            die("conection Failed:". $con-> conect_error);
        }

        //print the used character set - just for testing
        //printf("Initial character set: %s\n", mysqli_character_set_name($con));

        /* change character set to utf8 */
        if (!mysqli_set_charset($con, "utf8")) {
                printf("Error loading character set utf8: %s\n", mysqli_error($con));
                exit();
        } else {
                //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
        }

        //Select columns named from "a" to "e" from a database
        $sql = "SELECT id, prefilled_userName, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, projectGroup, projectName, projectLocality, projectDescription from exampleprojects ORDER BY prefilled_submissionStatus ASC";
        //variable to catch the results
        $results = $con-> query($sql);
        //function to fatch the data
        if ($results-> num_rows > 0 ) {
            while ($row = $results-> fetch_assoc()) {
                
              echo "<div class='projectDetail'>" . 
                "<a href='manageprojects.php?submissionid=%28x" .$row["id"]  . "%29y'><h4> Projekt ID:<strong> (" . $row["id"] . ")</strong> Název: <strong>" . $row["projectName"] . "</strong></h4></a>".
                "<p><strong>Autor žádosti:</strong></p><p>" .
                 $row["prefilled_firstName"] . " " . $row["prefilled_lastName"] . "<span class='projectDetail_submiter'> userName: " . $row["prefilled_userName"] . "</span></p>" .
                 "<p><strong>Spadá k typovému řešení :</strong></p><p>" . $row["projectGroup"] . "</p>" .
                 "<p><strong>Lokalita podaného projektu :</strong></p><p>" . $row["projectLocality"] . "</p>" .
                 "<p><strong>Popis projektu:</strong></p>" . "<p>" . $row["projectDescription"] . "</p>" .
                 "<p><strong>Status žádosti:</strong><p>" . $row["prefilled_submissionStatus"] . "</p>" .
               "</div>";
            }
          /*  echo ""; */
        }
        else {
            echo "0 result";
        }
        //Close the variable after finishing
        $con-> close();

        ?>

      <section>
    </div>
    </div> <!-- closing of the wrapper div, this div stars in the included header file-->

    </body>
    </html>