<?php
require 'config/config_localparts.php';

include("includes/header.php");


// Create connection
$sub_number = filter_input(INPUT_POST, 'prefilled_id');


// change character set to utf8
if (!mysqli_set_charset($con, "utf8")) {
  printf("Error loading character set utf8: %s\n", mysqli_error($con));
  exit();
} else {
 //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
}


$userRoleStatus = "";


$sql = "SELECT first_name, last_name, userRole, username FROM users WHERE id='$userLoggedIn'";

$results = $con-> query($sql);
//function to fatch the data
if ($results-> num_rows > 0 ) {
  while ($row = $results-> fetch_assoc()) {
    $userRoleStatus = $row["userRole"];
  }
}


$condition_isSubmissionStatus_code2 = "";
$condition_isUserOpeningHisSubmission = "";
$condition_isUserAdmin = ($userRoleStatus == "super");


$sql = "SELECT id, prefilled_userName, prefilled_email, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, prefilled_submissionDate, projectGroup, projectName, projectLocality, projectReferenceMain, projectReferenceOther, projectDescription, projectCosts, projectLegalIssues, administratorDecisionLetter, submitterDecisionResponse FROM exampleprojects WHERE id='$sub_number'";

$results = $con-> query($sql);
//function to fatch the data
if ($results-> num_rows > 0 ) {
  while ($row = $results-> fetch_assoc()) {

    $condition_isSubmissionStatus_code2 = ($row["prefilled_submissionStatus"] ==  "2 Vráceno k přepracování");
    $condition_isUserOpeningHisSubmission = ($row["prefilled_userName"] == $userLoggedIn);

    /*echo "<h4 class='submission--heading submissionDetail--id'> ID podání: </h4>" .
         "<p>" . $row["id"] . "<p>" .
         "<h4 class='submission--heading submissionDetail--name'> Název: </h4>" .
         "<p> <strong>Původní název: </strong>" . $row["projectName"] . "<p>" .
         "<p>" . $row["projectName"] . "</p>".
         "<br>";*/
      }
    echo "";
    }
    else {
       echo "<h3 style='text-align: center; color: coral'>Podaný projekt s vybraným ID není v databázi. Vyberte existující projekt!</h3>";
    }

     //test if the user can actually edit this
     if ( ( $condition_isSubmissionStatus_code2 && $condition_isUserOpeningHisSubmission ) || $condition_isUserAdmin ) {
         //
         //echo " Stay on page. "; //
     } else { 
         //
         //echo " Go to manageUserSubmissions.php "; //
         header("Location: manageUserSubmissions.php");
     }


// další inputy

 if ((( $condition_isSubmissionStatus_code2 == "true" ) && ( $condition_isUserOpeningHisSubmission == "true" )) ||  ( $condition_isUserAdmin == "true") ) {

  //connect and save
  $prefilled_id = filter_input(INPUT_POST, 'prefilled_id');
  $submission_name = filter_input(INPUT_POST, 'submission_name');
  $projectGroup = filter_input(INPUT_POST, 'projectGroup');
  $projectGroupCode = substr($projectGroup, 0, 4); 

  $projectLocality = filter_input(INPUT_POST, 'projectLocality');
  $projectDescription = filter_input(INPUT_POST, 'projectDescription');
  $projectLegalIssues = filter_input(INPUT_POST, 'projectLegalIssues');
  $projectCosts = filter_input(INPUT_POST, 'projectCosts');
  $prefilled_submissionDate = filter_input(INPUT_POST, 'prefilled_submissionDate');

  $projectReferenceMain = filter_input(INPUT_POST, 'projectReferenceMain');
  $projectReferenceOther = filter_input(INPUT_POST, 'projectReferenceOther');

  $submitterDecisionResponse = filter_input(INPUT_POST, 'submitterDecisionResponse');

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
    
    $sql =  "UPDATE exampleprojects SET prefilled_submissionStatus='3 přepracováno podavatelem', projectName='$submission_name', projectGroup='$projectGroup', projectLocality='$projectLocality', projectDescription='$projectDescription', projectLegalIssues='$projectLegalIssues', projectCosts='$projectCosts', prefilled_submissionDate='$prefilled_submissionDate',	projectReferenceMain='$projectReferenceMain', projectReferenceOther='$projectReferenceOther', submitterDecisionResponse='$submitterDecisionResponse' WHERE id = $prefilled_id";
    
    if ($dbConnection->query($sql)){
      echo "<a href='manageUserSubmissions.php'><button type= 'button ' class= 'btn btn-primary ' style= 'margin-bottom: 1.5rem;' >Zpět</button></a><br>" .
           "<h2>Nový záznam zapsán do databáze.</h2> <h4>Děkujeme Vám za Váš podmět, již se mu věnujeme. </h4>";
      
    } else {
      echo "<h2>Chyba: </h2><br>". $sql ." ". $dbConnection->error;
      echo "<a href='manageUserSubmissions.php'><button type= 'button ' class= 'btn btn-primary ' style= 'margin-bottom: 1.5rem;' >Zpět na mé projekty</button></a></div>";
    }
      $dbConnection->close();
    }
  

} else{
    echo "<h3>Došlo k chybě. Opakujte akci později</h3>" .
         "<a href='manageUserSubmissions.php'><button type='button' class='btn btn-info' style='margin-bottom: 1.5rem;'> Zpět na mé projekty </button> </a>";
    //Close the variable after finishing
    $con-> close();
    die();
  }

  //Close the variable after finishing
  $con-> close();

?>