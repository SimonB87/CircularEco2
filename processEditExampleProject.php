<?php
require 'config/config_localparts.php';

$id = filter_input(INPUT_POST, 'id');
$prefilled_submissionStatus = filter_input(INPUT_POST, 'prefilled_submissionStatus');
$administratorDecisionLetter = filter_input(INPUT_POST, 'administratorDecisionLetter');
$prefilled_currentUrl = filter_input(INPUT_POST, 'prefilled_currentUrl');

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
    echo "<h3>Žádost: ID: " . $id . " byla upravena administrátorem. Nový stav je: " . $prefilled_submissionStatus ." </h3>".
          "<a href='" . $prefilled_currentUrl . "'><button type= 'button' class= 'btn btn-primary' style= 'margin-bottom: 1.5rem;' >Zpět</button></a><br>". 
          "<a href= 'manage.php'><button type='button' class='btn btn-primary' style= 'margin-bottom: 1.5rem;'>Zpět na žádosti</button></a>";
    
  } else {
    include("includes/header.php");
    echo "<h3>Chyba: </h3><br>". $sql ." ". $dbConnection->error;
    echo "<a href='" . $prefilled_currentUrl ."'><button type= 'button ' class= 'btn btn-primary ' style= 'margin-bottom: 1.5rem;' >Zpět</button></a>" .
         "<a href= 'manage.php'><button type='button' class='btn btn-primary' style= 'margin-bottom: 1.5rem;'>Zpět na žádosti</button></a>";
  }
    $dbConnection->close();
  }

?>