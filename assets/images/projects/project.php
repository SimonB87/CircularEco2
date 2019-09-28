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

  <h2>Cirkulární projekty</h2>
  <h3>Opětovné využití materiálů</h3>
  <p><strong>Poznámka:</strong> Kliknutím na záhlaví sloupce se tabulka seřadí vzestupně/sestupně.</p>
  <p><strong>Poznámka:</strong> Do textového pole dojde k hledání v rámci sloupce.</p>


  <div class="container-fluid">
    <h1 class="text-center my-3">Card Carousel</h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner row w-100 mx-auto">

        <!-- <div class="carousel-item col-md-4 active">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 1</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>

        <div class="carousel-item col-md-4 active">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 2</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>

        <div class="carousel-item col-md-4 active">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 3</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>

        <div class="carousel-item col-md-4 active">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Card 44</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div> -->

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

            echo "<div class='carousel-item col-md-4 active'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>".$row["nazev"]."</h4>
                  <p class='card-text'>".$row["popis_dopady"]."</p>
                  <p class='card-text'>
                    <small class='text-muted'>".$row["typy_produktu"]."</small>
                  </p>
                </div>
              </div>
            </div>";

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
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mt-4">
            <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
              <i class="fa fa-lg fa-chevron-left"></i>
            </a>
            <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
              <i class="fa fa-lg fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>

</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>
