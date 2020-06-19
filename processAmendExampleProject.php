<?php
require 'config/config_localparts.php';

include("includes/header.php");

$condition_isSubmissionStatus_code2 = filter_input(INPUT_POST, 'condition_isSubmissionStatus_code2');
$condition_isUserOpeningHisSubmission = filter_input(INPUT_POST, 'condition_isUserOpeningHisSubmission');
$condition_isUserAdmin = filter_input(INPUT_POST, 'condition_isUserAdmin');

// další inputy

if ((( $condition_isSubmissionStatus_code2 == "true" ) && ( $condition_isUserOpeningHisSubmission == "true" )) ||  ( $condition_isUserAdmin == "true") ) {

  //connect and save

  /*
  $prefilled_userName = filter_input(INPUT_POST, 'prefilled_userName');
  $prefilled_email = filter_input(INPUT_POST, 'prefilled_email');
  $prefilled_firstName = filter_input(INPUT_POST, 'prefilled_firstName');
  $prefilled_lastName = filter_input(INPUT_POST, 'prefilled_lastName');
  $prefilled_submissionStatus = filter_input(INPUT_POST, 'prefilled_submissionStatus');
  $prefilled_submissionDate = filter_input(INPUT_POST, 'prefilled_submissionDate');
  
  $projectGroup = filter_input(INPUT_POST, 'projectGroup');
  $projectName = filter_input(INPUT_POST, 'projectName');
  $projectLocality = filter_input(INPUT_POST, 'projectLocality');
  
  $projectReferenceMain = filter_input(INPUT_POST, 'projectReferenceMain');
  $projectReferenceOther = filter_input(INPUT_POST, 'projectReferenceOther');
  $projectDescription = filter_input(INPUT_POST, 'projectDescription');
  $projectCosts = filter_input(INPUT_POST, 'projectCosts');
  $projectLegalIssues = filter_input(INPUT_POST, 'projectLegalIssues');
  $administratorDecisionLetter = filter_input(INPUT_POST, 'administratorDecisionLetter');
  $submitterDecisionResponse = filter_input(INPUT_POST, 'submitterDecisionResponse');
  
  $projectGroupCode = substr($projectGroup, 0, 4); 
  
  $prefilled_currentUrl = filter_input(INPUT_POST, 'prefilled_currentUrl');
   
 
      //replace with actual log in afterwards
  
      // Create connection
      $dbConnection = new mysqli ($host, $dbusername, $dbpassword, $dbname);
      if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
      } else {
  
        if (!mysqli_set_charset($dbConnection, "utf8")) {
          printf("Error loading character set utf8: %s\n", mysqli_error($con));
          exit();
          } else {
                  //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
          }
          
        $sql = "INSERT INTO exampleprojects (prefilled_userName, prefilled_email, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, prefilled_submissionDate, projectGroup, projectGroupCode, projectName, projectLocality, projectReferenceMain, projectReferenceOther, projectDescription, projectCosts, projectLegalIssues, administratorDecisionLetter, submitterDecisionResponse) VALUES ('$prefilled_userName', '$prefilled_email', '$prefilled_firstName', '$prefilled_lastName', '$prefilled_submissionStatus', '$prefilled_submissionDate', '$projectGroup', '$projectGroupCode','$projectName', '$projectLocality', '$projectReferenceMain', '$projectReferenceOther', '$projectDescription', '$projectCosts', '$projectLegalIssues', '$administratorDecisionLetter', '$submitterDecisionResponse')";
        
        if ($dbConnection->query($sql)){
          include("includes/header.php");
          echo "<h2>Nový záznam zapsán do databáze. Děkujeme Vám za Váš podmět, již se mu věnujeme. </h2>.".
                "<a href='" . $prefilled_currentUrl ."'><button type= 'button ' class= 'btn btn-primary ' style= 'margin-bottom: 1.5rem;' >Zpět</button></a></div><br>";        
          
        } else {
          include("includes/header.php");
          echo "<h2>Chyba: </h2><br>". $sql ." ". $dbConnection->error;
          echo "<a href='" . $prefilled_currentUrl ."'><button type= 'button ' class= 'btn btn-primary ' style= 'margin-bottom: 1.5rem;' >Zpět</button></a></div>";
        }
          $dbConnection->close();
        }
  */

}

else{
    echo "<h3>Došlo k chybě. Opakujte akci později</h3>" .
         "<a href='manageUserSubmissions.php'><button type='button' class='btn btn-info' style='margin-bottom: 1.5rem;'> Zpět na mé projekty </button> </a>";
    die();
  }
?>