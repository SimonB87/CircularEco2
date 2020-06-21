<?php

function insertSubmissionNotification($user_to, $type, $userLoggedIn, $userLoggedInName) {
		//$userLoggedIn = $userLoggedInFillerPlaceholder;
		//$userLoggedInName = $userLoggedInNameFillerPlaceholder;

		$date_time = date("Y-m-d H:i:s");
		switch($type) {
			case 'submission_delivered_toUser':
				$message = " Your submission was delivered successfully";
        break;
      case 'submission_delivered_toAdmin':
        $message = " A submission was delivered from " . $userLoggedInName;
        break;
			case 'submission_cancelled':
				$message = "Admin user " . $userLoggedInName . " did cancel your submitted project example";
				break;
			case 'submission_returned':
				$message = "Admin user " . $userLoggedInName . " did returned your submitted project example for further work";
				break;
			case 'submission_approved':
				$message = "Admin user " . $userLoggedInName . " did approved your submitted project example and it is now public";
				break;
		}
    $link = "manageUserSubmissions.php";
    
    require 'config/config_localparts.php';

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
        
      $sql = "INSERT INTO notifications (user_to, user_from, message, link, datetime, opened, viewed) VALUES ('$user_to', '$userLoggedIn', '$message', '$link', '$date_time', 'no', 'no')";
      

      if ($dbConnection->query($sql)){
        //echo "<strong>Notification added All Good.</strong><br>";
        
      } else {
        echo "<h3>Chyba: </h3><br>". $sql ." ". $dbConnection->error . "<br>";
      }

      $dbConnection->close();
      }
    
  }
  

?>