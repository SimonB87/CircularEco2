<?php

$prefilled_userName = filter_input(INPUT_POST, 'prefilled_userName');

$prefilled_firstName = filter_input(INPUT_POST, 'prefilled_firstName');

$prefilled_lastName = filter_input(INPUT_POST, 'prefilled_lastName');

$prefilled_email = filter_input(INPUT_POST, 'prefilled_email');

$prefilled_submissionStatus = filter_input(INPUT_POST, 'prefilled_submissionStatus');

$prefilled_submissionDate = filter_input(INPUT_POST, 'prefilled_submissionDate');

if (!empty($prefilled_userName )) or (!empty($prefilled_email )){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "cirksocial";
    // Create connection
    $dbConnection = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
    } else {
      
      $sql = "INSERT INTO exampleprojects (prefilled_userName, prefilled_email) VALUES ('$prefilled_userName', '$prefilled_email')";
      
      if ($dbConnection->query($sql)){
        echo "Nový záznam zapsán do databáze. Děkujeme.";
      } else {
        echo "Chyba: ". $sql ." ". $dbConnection->error;
      }
        $dbConnection->close();
      }
  } else{
    echo "Pole uživatelského jména nebo emailu by nemělo být prázdné";
    die();
  }
?>