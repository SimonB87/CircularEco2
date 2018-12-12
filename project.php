<?php
include("includes/header.php");

?>
<!-- CSS for the table of projects -->

<script src="assets/js/tabulka.js"></script>
<script src="assets/js/filtertable.js"></script>

<script type="text/javascript">
//1
var myElements = document.querySelectorAll(".hledej");
for (var i = 0; i < myElements.length; i++) {
  myElements[i].style.width = 100%;
  myElements[i].style.padding = "12px 10px 12px 10px";
  myElements[i].style.border = "1px solid #ddd";
}

//2
function myStyleFunction() {
    var element = document.getElementByClassName("hledej");
    element.classList.add("form-control");
}
//push 2
if (1 == 1) {
  myStyleFunction()
}

</script>

<!-- show profile picture-->
<div class="user_details column">
  <a href="<?php echo $userLoggedIn; ?>"><img src="<?php echo $user['profile_pic']; ?>" alt="profile pic"></a>

  <div class="user_details_left_right">

    <!-- show profile name-->
    <a href="<?php echo $userLoggedIn; ?>">
    <?php
    echo $user['first_name'] . " " . $user['last_name'];
    ?>
    </a>
    <!-- show number of profile posts-->
    <br>
    <?php
    echo "Posts: " . $user['num_posts'] . "<br>";
    echo "Likes: " . $user['num_likes'];
    ?>
  </div>

</div>

<div class="main_column column">

  <h2>Cirkulární projekty</h2>
  <h3>Opětovné využití materiálů</h3>
  <p><strong>Poznámka:</strong> Kliknutím na záhlaví sloupce se tabulka seřadí vzestupně/sestupně.</p>
  <p><strong>Poznámka:</strong> Do textového pole dojde k hledání v rámci sloupce.</p>

  <div class="row">

    <div class="col-md-3">
		<input type="text" class="hledej form-control" id="myInput" onkeyup="myFunction()" placeholder="Hledej v 2. sloupci" title="Hledej v 2. sloupci">
	</div>

  <div class="col-md-3">
		<input type="text" class="hledej form-control" id="myInputA" onkeyup="myFunctionA()" placeholder="Hledej v 3. sloupci" title="Hledej v 3. sloupci">
	</div>

  <div class="col-md-3">
    <input type="text" class="hledej form-control" id="myInputB" onkeyup="myFunctionB()" placeholder="Hledej v 4. sloupci" title="Hledej v 4. sloupci">
  </div>

  <div class="col-md-3">
		<input type="text" class="hledej form-control" id="myInputC" onkeyup="myFunctionC()" placeholder="Hledej v 5. sloupci" title="Hledej v 5. sloupci">
	</div>



 </div>

<table class="tabulka" id="myTable">
  <tr class="tabheader header">
    <th onclick="sortTable(0)">ID <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i></th>
    <th onclick="sortTable(1)">Název <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i></th>
    <th onclick="sortTable(2)">Popis: včetně environmentálních dopadů <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i> </th>
    <th onclick="sortTable(3)">Podmínky využití: <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i></th>
    <th onclick="sortTable(4)">Využitelné typy produktů/odpadů: <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i></th>
    <!--
    <th>SWOT Silné stránky:</th>
    <th>SWOT Slabé Stránky:</th>
    <th>SWOT Příležitosti:</th>
    <th>SWOT Hrozby:</th>
    <th>Cílová skupina:</th>

    <th onclick="sortTable(5)">Ekonomická náročnost: <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i></th>
    <th onclick="sortTable(6)">Personální náročnost: <i class="fas fa-angle-double-up"></i> <i class="fas fa-angle-double-down"></i></th>
    -->
    <!--
    <th onclick="sortTable(7)">Právní aspekty:</th>
    <th>Poznámka:</th>
    -->
  </tr>

  <?php
  //connect to the database
		$conn = $con; //Connection variable
  //in case of error during connecting to the database display error
  if ($conn-> connect_error) {
    die("Connection Failed:". $conn-> connect_error);
  }

  //print the used character set - just for testing
  //printf("Initial character set: %s\n", mysqli_character_set_name($conn));

  /* change character set to utf8 */
  if (!mysqli_set_charset($conn, "utf8")) {
      printf("Error loading character set utf8: %s\n", mysqli_error($conn));
      exit();
  } else {
      //printf("Current character set: %s\n", mysqli_character_set_name($conn));//used only for testing
  }

  //Select columns named from "a" to "e" from a database
  $sql = "SELECT id, nazev, popis_dopady, podminky_vyuziti, typy_produktu, swot_silne, swot_slabe, swot_prilezitosti, swot_hrozby, cilova_skupina, ekonomicka_narocnost, personalni_narocnost, pravo, poznamky from projects_cycle";
  //variable to catch the results
  $results = $conn-> query($sql);
  //function to fatch the data
  if ($results-> num_rows > 0 ) {
    while ($row = $results-> fetch_assoc()) {

      echo "<tr><td class='tabulka_id'><strong>".$row["id"]."</strong></td><td>".$row["nazev"]."</td><td>".$row["popis_dopady"]."</td><td>".$row["podminky_vyuziti"]."</td><td>".$row["typy_produktu"]."</td></tr>";
    }
    echo "";
  }
  else {
    echo "0 result";
  }
  //Close the variable after finishing
  $conn-> close();

  ?>

</div>

</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>
