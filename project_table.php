<?php
include("includes/header.php");

?>
<!-- CSS for the table of projects -->

<script src="assets/js/tabulka.js"></script>
<script src="assets/js/filtertable.js"></script>

<!-- show profile picture-->
<div class="col-md-3 col-xs-12 user_details user_details_profile">
  <div class="row user_details_row">
      <div class="col-xs-12 col-sm-6 col-md-12 text-center column">
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
  </div>
</div>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">

    <div class="project_table">
        <br>
            <input type="text" id="mySearchInput" onkeyup="mySearchFunction()" placeholder="Hledej v projektech.." title="Hledat v projektech">
        <br>
        <table id="mySearchTable" class="search_project_table">
            <tr>
                <th>Název</th>
                <th>Plný Název</th>
                <th>Plný Popis</th>
                <th>Cílová Skupina</th>
                <th>Související kategorie</th>
            </tr>

            <?php
            //connect to the database
            $conn = mysqli_connect("md54.wedos.net", "a223948_sbforum", "phx5EXKm", "d223948_sbforum");
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
            $sql = "SELECT web_nazev, plny_nazev, plny_popis, cilova_skupina, souvisejici_kategorie from projety_ce";
            //variable to catch the results
            $results = $conn-> query($sql);
            //function to fatch the data
            if ($results-> num_rows > 0 ) {
                while ($row = $results-> fetch_assoc()) {

                    echo "<tr><td><strong>".$row["web_nazev"]."</strong></td><td>".$row["plny_nazev"]."</td><td>".$row["plny_popis"]."</td><td>".$row["cilova_skupina"]."</td><td>".$row["souvisejici_kategorie"]."</td></tr>";
                }
                echo "";
            }
            else {
                echo "0 result";
            }
            //Close the variable after finishing
            $conn-> close();

            ?>

            <tr>
                <td>KONEC TABULKY</td>
            </tr>

        </table>

    </div>


</div>


</div> <!-- closing of the wrapper div, this div stars in the included header file-->

<script>
function mySearchFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mySearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mySearchTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
