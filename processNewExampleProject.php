<?php
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
 
if (!empty($prefilled_userName )) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "cirksocial";
    // Create connection
    $dbConnection = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
    } else {
      
      $sql = "INSERT INTO exampleprojects (prefilled_userName, prefilled_email, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, prefilled_submissionDate, projectGroup, projectName, projectLocality, projectReferenceMain, projectReferenceOther, projectDescription, projectCosts, projectLegalIssues, administratorDecisionLetter, submitterDecisionResponse) VALUES ('$prefilled_userName', '$prefilled_email', '$prefilled_firstName', '$prefilled_lastName', '$prefilled_submissionStatus', '$prefilled_submissionDate', '$projectGroup', '$projectName', '$projectLocality', '$projectReferenceMain', '$projectReferenceOther', '$projectDescription', '$projectCosts', '$projectLegalIssues', '$administratorDecisionLetter', '$submitterDecisionResponse')";
      
      if ($dbConnection->query($sql)){
        
        include("includes/header.php");
        echo "<h2>Nový záznam zapsán do databáze. Děkujeme</h2>.";
        echo "</div>";
      } else {

        include("includes/header.php");
        echo "<h2>Chyba: </h2><br>". $sql ." ". $dbConnection->error;
        echo "</div>";

      }
        $dbConnection->close();
      }
  } else{
    echo "Pole uživatelského jména by nemělo být prázdné";
    die();
  }
?>