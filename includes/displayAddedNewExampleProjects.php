<br>
<hr>
<br>

<h3>Přidané projekty od veřejnosti</h3>
<br>

<?php

//conect to the database
//in case of error during conecting to the database display error

require 'config/config_var.php';

//if ($con-> conect_error) {
//  die("conection Failed:". $con-> conect_error);
//}

if (!mysqli_set_charset($con, "utf8")) {
  printf("Error loading character set utf8: %s\n", mysqli_error($con));
  exit();
} else {
  //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
}

//////
$sql = "SELECT id, prefilled_userName, prefilled_firstName, prefilled_lastName, prefilled_submissionStatus, projectGroup, projectName, projectLocality, projectDescription FROM exampleprojects WHERE prefilled_submissionStatus='9 Schváleno' AND  projectGroupCode='$project_number' ORDER BY prefilled_submissionDate DESC";
//variable to catch the results
$results = $con-> query($sql);
//function to fatch the data
if ($results-> num_rows > 0 ) {
    while ($row = $results-> fetch_assoc()) {
        
      echo "<div class='projectDetail'>" . 
        "<a href='readSubmissionDetails.php?submissionid=%28x" .$row["id"]  . "%29y'><h4> Projekt ID:<strong> (" . $row["id"] . ")</strong> Název: <strong>" . $row["projectName"] . "</strong></h4></a>".
        "<p><strong>Lokalita podaného projektu :</strong></p><p>" . $row["projectLocality"] . "</p>" .
        "<p><strong>Popis projektu:</strong></p>" . "<p>" . $row["projectDescription"] . "</p>" .
      "</div>";
    }
  /*  echo ""; */
}
else {
    echo "Počet záznamů: 0";
}

$con-> close();
?>

<br>
<hr>
<br>