<?php
include("includes/header.php");

?>
<!-- CSS for the table of projects -->

<script src="assets/js/tabulka.js"></script>
<script src="assets/js/filtertable.js"></script>

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
    echo "Posty: " . $user['num_posts'] . "<br>";
    echo "Lajky: " . $user['num_likes'];
    ?>
  </div>

</div>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">
  <div class="projekty-back">
    <h2 class="projekty-back-title">Cirkulární projekty</h2>
  </div>
  <div class="row">
    <div class="col-md-12">

        <?php
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $position_in_string = strpos($actual_link, "number=");
        $project_number = substr($actual_link, $position_in_string + 7);

        //security function for injections
        $link = $con;
        $project_number = mysqli_real_escape_string($link, $project_number);
        //testing
        //echo "Project Number from URL:: " . $project_number;//testing end

      
        //conect to the database
        //old: $conn = mysqli_conect("md54.wedos.net", "a223948_sbforum", "phx5EXKm", "d223948_sbforum");
        //in case of error during conecting to the database display error
        if ($con-> conect_error) {
          die("conection Failed:". $con-> conect_error);
        }

        //print the used character set - just for testing
        //printf("Initial character set: %s\n", mysqli_character_set_name($con));

        /* change character set to utf8 */
        if (!mysqli_set_charset($con, "utf8")) {
              printf("Error loading character set utf8: %s\n", mysqli_error($con));
              exit();
        } else {
              //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
        }


        //Select columns named from "a" to "e" from a database
        $sql = "SELECT kategorie, plny_nazev, plny_popis, podminky_vyuziti, vyuzitelne_produkty, SWOT_analyza, cilova_skupina, ekonomicke_podminky, personálni_narocnost, pravni_aspekty, priklad_praxe, souvisejici_kategorie FROM projety_ce WHERE id='$project_number'";
        //variable to catch the results
        $results = $con-> query($sql);
        //function to fatch the data
        if ($results-> num_rows > 0 ) {
          while ($row = $results-> fetch_assoc()) {

              echo "<h2 style='text-align: center; color: coral'><br>".$row["plny_nazev"]."</h2>";

              echo "<div> <strong> Kategorie: </strong></div><div>" .$row["kategorie"]. "</div><br>";

              echo "<div> <strong> Plný popis: </strong></div><div>" .$row["plny_popis"]. "</div><br>";

              echo "<div> <strong> Podmínky využití / bariéry: </strong></div><div>" .$row["podminky_vyuziti"]. "</div><br>";

              echo "<div> <strong> Využitelné typy produktů/ odpadů: </strong></div><div>" .$row["vyuzitelne_produkty"]. "</div><br>";

              echo "<div> <strong> SWOT analýza: </strong></div><div>" .$row["SWOT_analyza"]. "</div><br>";

              echo "<div> <strong> Cílová skupina: </strong></div><div>" .$row["cilova_skupina"]. "</div><br>";

              echo "<div> <strong> Ekonomické podmínky a přínosy: </strong></div><div>" .$row["ekonomicke_podminky"]. "</div><br>";

              echo "<div> <strong> Personální náročnost: </strong></div><div>" .$row["personálni_narocnost"]. "</div><br>";

              echo "<div> <strong> Právní aspekty: </strong></div><div>" .$row["pravni_aspekty"]. "</div><br>";

              echo "<div> <strong> Příklad z praxe: </strong></div><div>" .$row["priklad_praxe"]. "</div><br>";

              echo "<div> <strong> Související kategorie </strong></div><div>" .$row["souvisejici_kategorie"]. "</div><br>";

          }
          echo "";
        }
        else {
          echo "<h3 style='text-align: center; color: coral'>Projekt s vybraným číslem není v databázi. Vyberte existující projekt!</h3>";
        }
        //Close the variable after finishing
        $con-> close();

        ?>


    </div>
  </div>



</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>
