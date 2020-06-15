<section class="submitNewProject">
<hr>


<h2>Připojte svůj projekt:</h2><br>

<button type="button" class="btn btn-primary" style="margin-bottom: 1.5rem;" onclick="toggleNewProjectForm();">Vyplnit přihlášku nového projektu</button>

<form id="newProjectSubmitForm" method="post" action="processNewExampleProject.php" class="hiddenForm">
<!-- Hidden -->
<div class="projectFormHiddenSection">

  <label for="prefilled_userName"><strong>Username : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_userName" class="newProjectForm input" name="prefilled_userName" value="<?php echo $user['username']; ?>"><br>
  <br>

  <label for="prefilled_firstName"><strong>User First Name : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_firstName" class="newProjectForm input" name="prefilled_firstName" value="<?php echo $user['first_name']; ?>"><br>
  <br>

  <label for="prefilled_lastName"><strong>User Last Name : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_lastName" class="newProjectForm input" name="prefilled_lastName" value="<?php echo $user['last_name']; ?>"><br>
  <br>

  <label for="prefilled_email"><strong>User Email : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_email" class="newProjectForm input" name="prefilled_email" value="<?php echo $user['email']; ?>"><br>
  <br>

  <label for="prefilled_submissionStatus"><strong>Submission status : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_submissionStatus" class="newProjectForm input" name="prefilled_submissionStatus" value="1 Nová žádost"><br>
  <!-- 1 Nová žádost, 0 Zamítnuto, 2 Vráceno k přepracování, 9 Schváleno -->
  <br>

  <label for="prefilled_submissionDate"><strong>Date of submission : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_submissionDate" class="newProjectForm input" name="prefilled_submissionDate"><br>
  <br>

  <label for="prefilled_currentUrl"><strong>Current URL : </strong><span class="hiddenLabelStyle"> * hidden </span></label><br>
  <input type="text" id="prefilled_currentUrl" class="newProjectForm input" name="prefilled_currentUrl"><br>
  <br>

</div>
<!-- Visible -->
<label for="projectGroup"><strong>Typové řešení :</strong></label><br>

<select name="projectGroup" id="projectGroup" class="newProjectForm input">

  <?php
  //conect to the database
  //in case of error during conecting to the database display error
  //if ($con_projects-> conect_error) {
  //    die("conection Failed:". $con_projects-> conect_error);
  //}

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
          
        echo "<option value='" . $row["id"] . " - " . $row["web_nazev"] . "'" . ">" . $row["web_nazev"] . " - ID: " . $row["id"] . "</option>";
      }
    /*  echo ""; */
  }
  else {
      echo "0 result";
  }
  //Close the variable after finishing
  $con_projects-> close();

  ?>

</select><br>

<label for="projectName" class="formLabelStyle"><strong>Jméno vašeho projektu : </strong> <span class="requiredLabelStyle"> * povinné </span></label><br>
<input type="text" name="projectName" id="projectName" class="newProjectForm input" required><br>

<label for="projectLocality" class="formLabelStyle"><strong>Lokalita vašeho projektu :</strong> <span class="requiredLabelStyle"> * povinné </span></label><br>
<input type="text" name="projectLocality" id="projectLocality" class="newProjectForm input" required><br>

<label for="projectDescription" class="formLabelStyle"><strong>Popis vašeho projektu :</strong> <span class="requiredLabelStyle"> * povinné </span></label><br>
<textarea id="projectDescription" name="projectDescription" rows="6" class="newProjectForm input" required> </textarea><br>

<label for="projectCosts" class="formLabelStyle"><strong>Náklady na realizaci :</strong><span class="requiredLabelStyle"> * povinné </span></label><br>
<textarea id="projectCosts" name="projectCosts" rows="6" class="newProjectForm input" required> </textarea><br>

<label for="projectLegalIssues" class="formLabelStyle"><strong>Právní omezení a souvislosti :</strong><span class="requiredLabelStyle"> * povinné </span></label><br>
<textarea id="projectLegalIssues" name="projectLegalIssues" rows="6" class="newProjectForm input" required> </textarea><br>

<label for="projectReferenceMain" class="formLabelStyle"><strong>Odkaz na váš projekt (webový odkaz) :</strong><span class="requiredLabelStyle"> * povinné </span></label><br>
<input type="text" name="projectReferenceMain" id="projectReferenceMain" class="newProjectForm input" required><br>

<label for="projectReferenceOther" class="formLabelStyle"><strong>Další odkaz na výš projekt (webový odkaz) :</strong></label><br>
<input type="text" name="projectReferenceOther" id="projectReferenceOther" class="newProjectForm input"><br>


<button type="submit" form="newProjectSubmitForm" value="Odeslat návrh projektu" class="btn btn-success" style="margin: 1.5rem 0;">Odeslat návrh projektu</button>
<!-- <input type="submit" value="Submit"> -->
</form>

<div>
<br><br>
//TODO:<br>
. Po podání nová obrazovka - místo echo include, kde bude menu a jen infromace pro usera o stavu podání (Děkujeme, či něco se pokazilo).<br>

//TODO:<br>
. založit sekci management podaných řešení<br>
. pro administrátora i pro uživatele<br>
. tabulka s projekty a jejich překlik na detail<br>
</div>
<hr>
</section>

<script defer src="assets/js/editNewProjectSumbissionForm.js"></script>