<?php
require 'config/config_localparts.php';

$id = filter_input(INPUT_POST, 'id');
$prefilled_submissionStatus = filter_input(INPUT_POST, 'prefilled_submissionStatus');
$administratorDecisionLetter = filter_input(INPUT_POST, 'administratorDecisionLetter');
$prefilled_currentUrl = filter_input(INPUT_POST, 'prefilled_currentUrl');
$prefilled_userName = filter_input(INPUT_POST, 'prefilled_userName');
$prefilled_projectName = filter_input(INPUT_POST, 'prefilled_projectName');
$prefilled_id = filter_input(INPUT_POST, 'prefilled_id');

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
    
  $sql = "UPDATE exampleprojects SET prefilled_submissionStatus='$prefilled_submissionStatus', administratorDecisionLetter='$administratorDecisionLetter' WHERE id='$id'";
  
  if ($dbConnection->query($sql)){
    include("includes/header.php");
    echo "<div class='col-md-8 col-xs-12 col-md-push-1 main_column column'>";
    echo "<a href='" . $prefilled_currentUrl . "'><button type= 'button' class= 'btn btn-primary' style= 'margin-bottom: 1.5rem;' >Zpět</button></a><br>". 
         "<a href= 'manage.php'><button type='button' class='btn btn-primary' style= 'margin-bottom: 1.5rem;'>Zpět na žádosti</button></a>" .
         "<h3>Žádost: ID: " . $id . " byla upravena administrátorem. Nový stav je: " . $prefilled_submissionStatus ." </h3>";

    //send email to notify admin - rework the file
    //include("includes/sendEmailNotificationToAdmin.php");

    //send notification to notify user and admin about a new submission
    include("includes/insertSubmissionNotification.php");

    if ($prefilled_submissionStatus == "0 Zamítnuto") {
      insertSubmissionNotification($prefilled_userName, "submission_cancelled", $userLoggedInFillerPlaceholder, $userLoggedInNameFillerPlaceholder);
      insertSubmissionNotification("spravce_obcevkruhu", "submission_cancelled", $userLoggedInFillerPlaceholder, $userLoggedInNameFillerPlaceholder);
    } elseif ( $prefilled_submissionStatus == "2 Vráceno k přepracování" ) {
      insertSubmissionNotification($prefilled_userName, "submission_returned", $userLoggedInFillerPlaceholder, $userLoggedInNameFillerPlaceholder);
      insertSubmissionNotification("spravce_obcevkruhu", "submission_returned", $userLoggedInFillerPlaceholder, $userLoggedInNameFillerPlaceholder);
    } elseif ( $prefilled_submissionStatus == "9 Schváleno" ) {
      insertSubmissionNotification($prefilled_userName, "submission_approved", $userLoggedInFillerPlaceholder, $userLoggedInNameFillerPlaceholder);
      insertSubmissionNotification("spravce_obcevkruhu", "submission_approved", $userLoggedInFillerPlaceholder, $userLoggedInNameFillerPlaceholder);
      //send email to admin about new submission aproved!
      include("includes/sendEmailNotificationToAdmin_submApproved.php");
    }

    echo "</div>";
  } else {
    include("includes/header.php");
    echo "<div class='col-md-8 col-xs-12 col-md-push-1 main_column column'>";
    echo "<h3>Chyba: </h3><br>". $sql ." ". $dbConnection->error . "<br>";
    echo "<a href='" . $prefilled_currentUrl ."'><button type= 'button ' class= 'btn btn-primary ' style= 'margin-bottom: 1.5rem;' >Zpět</button></a>" .
         "<a href= 'manage.php'><button type='button' class='btn btn-primary' style= 'margin-bottom: 1.5rem;'>Zpět na žádosti</button></a>";
    echo "</div>";
  }
    $dbConnection->close();
  }

?>