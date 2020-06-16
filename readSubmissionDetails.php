<?php
include("includes/header.php");

if (isset($_SESSION['username'])) {
  $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
  $row = mysqli_fetch_array($user_data_query);
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $userRole = $row['userRole'];
  
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
        <a href="tableprojects.php"><button type="button " class="btn btn-primary " style="margin-bottom: 1.5rem;">Zpět na typová řešení</button></a>
        <h2>Detail projektu</h2>


        <?php
        //require 'config/config_localparts.php';

        $actual_sub_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        function getBetween($string, $start, $end, $dbConnection){
          if (strpos($string, $start)) { // required if $start not exist in $string
              $startCharCount = strpos($string, $start) + strlen($start);
              $firstSubStr = substr($string, $startCharCount, strlen($string));
              $endCharCount = strpos($firstSubStr, $end);
              if ($endCharCount == 0) {
                  $endCharCount = strlen($firstSubStr);
              }
              return mysqli_real_escape_string($dbConnection, substr($firstSubStr, 0, $endCharCount));
          } else {
              return '';
          }
        }
        // Create connection
        $sub_number = getBetween($actual_sub_link, "%28x", "%29y", $con);
        
        //conect to the database
        
        //in case of error during conecting to the database display error
        //if ($con-> conect_error) {
        //  die("conection Failed:". $con-> conect_error);
        //}

        //print the used character set - just for testing
        //printf("Initial character set: %s\n", mysqli_character_set_name($con));

        // change character set to utf8
        if (!mysqli_set_charset($con, "utf8")) {
              printf("Error loading character set utf8: %s\n", mysqli_error($con));
              exit();
        } else {
              //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
        }


        //Select columns named from "a" to "e" from a database
        $sql = "SELECT id, prefilled_userName, prefilled_email, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, prefilled_submissionDate, projectGroup, projectName, projectLocality, projectReferenceMain, projectReferenceOther, projectDescription, projectCosts, projectLegalIssues, administratorDecisionLetter, submitterDecisionResponse FROM exampleprojects WHERE id='$sub_number'";
        //variable to catch the results
        $results = $con-> query($sql);
        //function to fatch the data
        if ($results-> num_rows > 0 ) {
          while ($row = $results-> fetch_assoc()) {
              echo "<h4 class='submission--heading submissionDetail--id'> ID podání: </h4>" .
                   "<p>" . $row["id"] . "<p>" .
                   "<h4 class='submission--heading submissionDetail--name'> Název: </h4>" .
                   "<p>" . $row["projectName"] . "<p>" .
                   "<h4 class='submission--heading submissionDetail--submiter'> Projekt podal: </h4> " . 
                   "<p> <strong>Jméno:</strong>" . $row["prefilled_firstName"] . " " . $row["prefilled_lastName"] . "</p>" .
                   "<p> <strong>Uživatelské jméno: </strong>" . $row["prefilled_userName"] . 
                   "<h4 class='submission--heading submissionDetail--projectDescription'> Popis projektu: </h4>" . 
                   "<p>" . $row["projectDescription"] . "</p>".
                   "<h4 class='submission--heading submissionDetail--projectLegalIssues'> Právní souvislosti projektu: </h4>" . 
                   "<p>" . $row["projectLegalIssues"] . "</p>".
                   "<h4 class='submission--heading submissionDetail--projectLegalIssues'> Nákladové souvislosti projektu: </h4>" . 
                   "<p>" . $row["projectCosts"] . "</p>".
                   "<h4 class='submission--heading submissionDetail--metaData'> Podrobnosti žádosti: </h4>" . 
                   "<p> <strong>Datum podání: </strong>" . $row["prefilled_submissionDate"] . ", <strong> status: </strong>" . $row["prefilled_submissionStatus"] . "</p>" .
                   "<p><strong>Přiřazené typové řešení: </strong>" . $row["projectGroup"] . ", <strong> lokalita projektu: </strong>" . $row["projectLocality"] . "</p>" .
                   "<p><strong>Odkaz na projekt: </strong>" . $row["projectReferenceMain"] . "</p>" .
                   "<p><strong>Další odkaz na projekt: </strong>" . $row["projectReferenceOther"] . "</p>" .
                   "<h4 class='submission--heading submissionDetail--administratorDecisionLetter'> Vyjádření administrátora k projektu: </h4>";

              if ( strlen($row["administratorDecisionLetter"]) < 1) {
                echo "<br>";
              } else {
                echo "<p>" . $row["administratorDecisionLetter"] . "</p>";
              }

              echo "<h4 class='submission--heading submissionDetail--submitterDecisionResponse'> Vyjádření podavatele k projektu: </h4>";

              if ( strlen($row["submitterDecisionResponse"]) < 1) {
                echo "<br>";
              } else {
                echo "<p> " . $row["submitterDecisionResponse"] . "</p><br>";
              }
          }
          echo "";
        }
        else {
          echo "<h3 style='text-align: center; color: coral'>Podaný projekt s vybraným ID není v databázi. Vyberte existující projekt!</h3>";
        }
        
        //Close the variable after finishing
        $con-> close();
        ?>


      <section>
    </div>
    </div> <!-- closing of the wrapper div, this div stars in the included header file-->

    <script defer=""> 
      setTimeout(function(){ 
        var targetInput = document.getElementById("prefilled_currentUrl");
        var windowUrl = window.location.href;

        targetInput.value = windowUrl;
      }, 300); 
    </script>
    </body>
    </html>