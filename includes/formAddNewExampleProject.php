<br>
<hr>
<!-- <br>

<h2>Test heslo:</h2>
<br>
<form method="post" action="processNewExampleProject.php">
<label for="username"><strong>Username :</strong></label><br>
<input type="text" id="username" name="username"><br><br>
<label for="username"><strong>Password :</strong></label><br>
<input type="password" name="password"><br><br>
<input type="submit" value="Submit">
</form>
<br> -->

<h2>Připojte svůj projekt:</h2><br>
<form method="post" action="processNewExampleProject.php">
<!-- Hidden -->
<div class="projectFormHiddenSection">

  <label for="prefilled_userName"><strong>Username : * hidden</strong></label><br>
  <input type="text" id="prefilled_userName" name="prefilled_userName" value="<?php echo $user['username']; ?>"><br>
  <br>

  <label for="prefilled_firstName"><strong>User First Name : * hidden</strong></label><br>
  <input type="text" id="prefilled_firstName" name="prefilled_firstName" value="<?php echo $user['first_name']; ?>"><br>
  <br>

  <label for="prefilled_lastName"><strong>User Last Name : * hidden</strong></label><br>
  <input type="text" id="prefilled_lastName" name="prefilled_lastName" value="<?php echo $user['last_name']; ?>"><br>
  <br>

  <label for="prefilled_email"><strong>User Email : * hidden</strong></label><br>
  <input type="text" id="prefilled_email" name="prefilled_email" value="<?php echo $user['email']; ?>"><br>
  <br>

  <label for="prefilled_submissionDate"><strong>Datum zaslání žádosti : * hidden</strong></label><br>
  <input type="date" name="prefilled_submissionDate" id="prefilled_submissionDate"><br>
  <br>

</div>
<!-- Visible -->
<label for="projectGroup"><strong>Typové řešení :</strong></label><br>

<select name="projectGroup" id="projectGroup">

<!--   <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel" selected="selected">Opel</option>
  <option value="audi">Audi</option> -->


<?php
//conect to the database
//old: $conn = mysqli_conect("md54.wedos.net", "a223948_sbforum", "phx5EXKm", "d223948_sbforum");
//in case of error during conecting to the database display error
if ($con_projects-> conect_error) {
    die("conection Failed:". $con_projects-> conect_error);
}

//print the used character set - just for testing
//printf("Initial character set: %s\n", mysqli_character_set_name($con));

/* change character set to utf8 */
if (!mysqli_set_charset($con_projects, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($con_projects));
        exit();
} else {
        //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
}

//Select columns named from "a" to "e" from a database
$sql = "SELECT id, web_nazev from typova_reseni ORDER BY web_nazev ASC";
//variable to catch the results
$results = $con_projects-> query($sql);
//function to fatch the data
if ($results-> num_rows > 0 ) {
    while ($row = $results-> fetch_assoc()) {
        
      echo "<option value='" . $row["id"] . " - " . $row["web_nazev"] . "'" . "> ID: [" . $row["id"] . "] - " . $row["web_nazev"] . "</option>";
    }
   /*  echo ""; */
}
else {
    echo "0 result";
}
//Close the variable after finishing
$con_projects-> close();

?>

</select>


<!-- <input type="text" name="projectGroup" id="projectGroup" required><br> -->

<br>
<label for="projectName"><strong>Jméno projektu :</strong></label><br>
<input type="text" name="projectName" id="projectName" required><br>
<br>
<label for="projectLocality"><strong>Lokalita projektu :</strong></label><br>
<input type="text" name="projectLocality" id="projectLocality" required><br>
<br>
<label for="projectLocality"><strong>Popis projektu :</strong></label><br>
<textarea id="projectDescription" name="projectDescription" rows="6" required> </textarea>
<br>

<label for="projectCosts"><strong>Náklady na realizaci :</strong></label><br>
<textarea id="projectCosts" name="projectCosts" rows="6" required> </textarea>
<br>

<label for="projectLegalIssues"><strong>Právní omezení a souvislosti :</strong></label><br>
<textarea id="projectLegalIssues" name="projectLegalIssues" rows="6" required> </textarea>
<br>

<label for="projectReferenceMain"><strong>Odkaz na projekt (webový odkaz) :</strong></label><br>
<input type="text" name="projectReferenceMain" id="projectReferenceMain" required><br>
<br>

<label for="projectReferenceOther"><strong>Další odkaz na projekt (webový odkaz) :</strong></label><br>
<input type="text" name="projectReferenceOther" id="projectReferenceOther"><br>
<br>

<input type="submit" value="Submit">
</form>
//Plánovaný formulář:<br>
. (-) Username ... autofilled - HOTOVO  <br>
. (-) UserEmail ... autofilled - HOTOVO  <br>
. (-) čas podání žádosti ... autofilled - HOTOVO <br>
. (-) jméno typového řešení ke kterému se projekt váže - comboBox - standardně to typové řešení, které je nyní zobrazneno je vybráno <br>
. Jméno vzorového projektu - povinné!<br>
. Lokalita projektu - povinné!<br>
. Popis vzorového projektu - povinné!<br>
. (+) Náklady na realizaci<br>
. (+) Právní souvislosti<br>
. Další zdroje1 - web? - povinné!<br>
. (+) Další Zdroje2 - cokoliv?<br>
- (-) status autofilled na (podáno) (jinak schváleno / zamítnuto / vráceno k přepracování)<br>

//TODO:
. Po podání nová obrazovka - místo echo include, kde bude menu a jen infromace pro usera o stavu podání (Děkujeme, či něco se pokazilo).

//TODO:
. založit sekci management podaných řešení
. pro administrátora i pro uživatele
. tabulka s projekty a jejich překlik na detail
<br>
<br>
<hr>
<br>

<script defer src="assets/js/editNewProjectForm.js"></script>