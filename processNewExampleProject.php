<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
  if (!empty($password)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "cirksocial";
    // Create connection
    $dbConnection = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
    } else {
      
      $sql = "INSERT INTO exampleprojects (username, password) VALUES ('$username', '$password')";
      
      if ($dbConnection->query($sql)){
        echo "Nový záznam zapsán do databáze. Děkujeme.";
      } else {
        echo "Chyba: ". $sql ." ". $dbConnection->error;
      }
        $dbConnection->close();
      }
  } else{
    echo "Pole heslo by nemělo být prázdné";
    die();
  }
} else {
  echo "Pole jméno by nemělo být prázdné.";
  die();
 }
?>