<?php
include("includes/header.php");

// user - submission detail view

$condition_isUserAdmin = "";

if (isset($_SESSION['username'])) {
  $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
  $row = mysqli_fetch_array($user_data_query);
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $userRole = $row['userRole'];

  if ($userRole == "super") {
    $condition_isUserAdmin = true;
  } else {
    $condition_isUserAdmin = false;
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
  </div>
  </div>
 
    <div class="col-md-8 col-xs-12 col-md-push-1 main_column column">
      <section>
        <a href="manage.php"><button type="button " class="btn btn-primary " style="margin-bottom: 1.5rem;">Zpět </button></a>
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

          if (!mysqli_set_charset($con_projects, "utf8")) {
            printf("Error loading character set utf8: %s\n", mysqli_error($con_projects));
            exit();
          } else {
                  //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
          }
          //Select columns named from "a" to "e" from a database
          $optionStorage = "";

          $sql = "SELECT id, web_nazev from typova_reseni ORDER BY web_nazev ASC";
          //variable to catch the results
          $results = $con_projects-> query($sql);
          //function to fatch the data
          if ($results-> num_rows > 0 ) {
              while ($row = $results-> fetch_assoc()) {
                $optionStorage = $optionStorage . "<option value='" . $row["id"] . " - " . $row["web_nazev"] . "'" . ">" . $row["web_nazev"] . " - ID: " . $row["id"] . "</option>";
              }
            /*  echo ""; */
          }
          else {
            $optionStorage = "<option value='Chyba spojení s databází'> Chyba spojení s databází </option>";
          }

        //Select columns named from "a" to "e" from a database
        $sql = "SELECT id, prefilled_userName, prefilled_email, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, prefilled_submissionDate, projectGroup, projectName, projectLocality, projectReferenceMain, projectReferenceOther, projectDescription, projectCosts, projectLegalIssues, administratorDecisionLetter, submitterDecisionResponse FROM exampleprojects WHERE id='$sub_number'";

        //conditions if user is editing his submission
        $condition_isSubmissionStatus_code2 = "";
        $condition_isUserOpeningHisSubmission = "";

        //variable to catch the results
        $results = $con-> query($sql);
        //function to fatch the data
        if ($results-> num_rows > 0 ) {
          while ($row = $results-> fetch_assoc()) {

              $condition_isSubmissionStatus_code2 = ($row["prefilled_submissionStatus"] ==  "2 Vráceno k přepracování");
              $condition_isUserOpeningHisSubmission = ($row["prefilled_userName"] == $userLoggedIn);

              echo "<form id='amendProjectForm' method='post' action='processAmendExampleProject.php' class=''>" .
                   "<h4 class='submission--heading submissionDetail--id'> ID podání: </h4>" .
                   "<p>" . $row["id"] . "<p>" .

                   "<h4 class='submission--heading submissionDetail--name'> Název: </h4>" .
                   "<p> <strong>Původní název: </strong>" . $row["projectName"] . "<p>" .
                   "<input type='text' id='submission_name' class='newProjectForm input' name='submission_name' value='" . $row["projectName"] . "'><br>".
                   "<br>".

                   "<h4 class='submission--heading submissionDetail--projectDescription'> Přiřazené typové řešení: </h4>" . 
                   "<p><strong>Původní hodnota: </strong>" . $row["projectGroup"] . "</p>" .
                   "<select name='projectGroup' id='projectGroup' class='newProjectForm input'>" .
                      "<option value='Vyberte ...'>Vyberte ...</option>" .
                      $optionStorage .
                   "</select><br>" .


                   "<h4 class='submission--heading submissionDetail--projectDescription'> Lokalita projektu: </h4>" . 
                   "<p><strong>Původní lokalita: </strong>". $row["projectLocality"] . "</p>" .
                   "<input type='text' id='projectLocality' class='newProjectForm input' name='projectLocality' value='" . $row["projectLocality"] . "'><br>".

                   "<h4 class='submission--heading submissionDetail--projectDescription'> Popis projektu: </h4>" . 
                   "<p> <strong>Původní popis: </strong>" . $row["projectDescription"] . "</p>" .
                   "<textarea id='projectDescription' class='newProjectForm input' name='projectDescription' rows='6'>" . $row["projectDescription"] . "</textarea> <br>".
                   "<br>".

                   "<h4 class='submission--heading submissionDetail--projectLegalIssues'> Právní souvislosti projektu: </h4>" . 
                   "<p> <strong>Původní právní souvislosti: </strong>" . $row["projectLegalIssues"] . "</p>".
                   "<textarea id='projectLegalIssues' class='newProjectForm input' name='projectLegalIssues' rows='6'>" . $row["projectLegalIssues"] . "</textarea> <br>".

                   "<h4 class='submission--heading submissionDetail--projectLegalIssues'> Nákladové souvislosti projektu: </h4>" . 
                   "<p> <strong>Původní nákladové souvislosti: </strong>" . $row["projectCosts"] . "</p>".
                   "<textarea id='projectCosts' class='newProjectForm input' name='projectCosts' rows='6'>" . $row["projectCosts"] . "</textarea> <br>".
                   "<br>".

                   "<h4 class='submission--heading submissionDetail--metaData'> Podrobnosti žádosti: </h4>" . 
                   "<p> <strong>Datum opětovného podání: </strong>" . $row["prefilled_submissionDate"] . ", <strong> status: </strong>" . $row["prefilled_submissionStatus"] . "</p>" .
                   "<input type='text' id='prefilled_submissionDate' class='newProjectForm input' name='prefilled_submissionDate' value=''><br>".
                   "<br>".

                   "<p><strong>Odkaz na projekt: </strong>" . $row["projectReferenceMain"] . "</p>" .
                   "<input type='text' id='projectReferenceMain' class='newProjectForm input' name='projectReferenceMain' value='" . $row["projectReferenceMain"]  . "'><br>".
                   "<br>".

                   "<p><strong>Další odkaz na projekt: </strong>" . $row["projectReferenceOther"] . "</p>" .
                   "<input type='text' id='projectReferenceOther' class='newProjectForm input' name='projectReferenceOther' value='" . $row["projectReferenceOther"]  . "'><br>".
                   "<br>".

                   "<h4 class='submission--heading submissionDetail--administratorDecisionLetter'> Vyjádření administrátora k projektu: </h4>";

              if ( strlen($row["administratorDecisionLetter"]) < 1) {
                echo "<br>";
              } else {
                echo "<p>" . $row["administratorDecisionLetter"] . "</p>";
              }

              echo "<h4 class='submission--heading submissionDetail--submitterDecisionResponse'> Vyjádření podavatele k projektu: </h4>" .
                   "<textarea id='submitterDecisionResponse' class='newProjectForm input' name='submitterDecisionResponse' rows='6'>" . $row["submitterDecisionResponse"] . "</textarea> <br>";

              //conditions for next step validation on target process

              if ($condition_isSubmissionStatus_code2) { $value_a = "41"; } else { $value_a = "22"; }
              if ($condition_isUserOpeningHisSubmission) { $value_b = "54"; } else { $value_b = "65"; }
              if ($condition_isUserAdmin) { $value_c = "87"; } else { $value_c = "48"; }

              echo  "<input type='text' id='condition_isSubmissionStatus_code2' class='newProjectForm input' name='condition_isSubmissionStatus_code2' value='" . $value_a  . "'><br>".
              "<input type='text' id='condition_isUserOpeningHisSubmission' class='newProjectForm input' name='condition_isUserOpeningHisSubmission' value='" . $value_b  . "'><br>".
              "<input type='text' id='condition_isUserAdmin' class='newProjectForm input' name='condition_isUserAdmin' value='" . $value_c  . "'><br>";
              
              echo "<button type='submit' form='amendProjectForm' value='Odeslat návrh projektu' class='btn btn-success' style='margin: 1.5rem 0;'>Odeslat návrh projektu</button>" .
                   "</form>";
          }
          echo "";
        }
        else {
          echo "<h3 style='text-align: center; color: coral'>Podaný projekt s vybraným ID není v databázi. Vyberte existující projekt!</h3>";
        }

        //test if the user can actually edit this

        if ( ( $condition_isSubmissionStatus_code2 && $condition_isUserOpeningHisSubmission ) || $condition_isUserAdmin ) { //FIX THIS Condition
            echo "  ";
        } else { 
            header("Location: manageUserSubmissions.php");
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