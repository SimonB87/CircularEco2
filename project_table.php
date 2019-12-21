<?php
include("includes/header.php");

?>
<!-- CSS for the table of projects -->

<script src="assets/js/tabulka.js"></script>
<script src="assets/js/filtertable.js"></script>

<!-- show profile picture-->
<div class="col-md-12 col-xs-12 user_details user_details_profile mySearchTable_user_details">
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

<div class="col-md-12 col-xs-12 col-md-push-1 main_column column">

    <div class="project_table">
        <div class="project_table_info">Stránka je optimalizována pro rozlišení s šířkou 1000px a větší.</div>
        <br>
            <input type="text" id="mySearchInput" onkeyup="mySearchFunction()" placeholder="Hledej v projektech.." title="Hledat v projektech">
        <br>

        <div class="row" style="display:none;">
        <!--
          <div class="col-md-2">
            <input type="text" class="hledej form-control" id="myInput0" onkeyup="mySearchColumnFunction(0)" placeholder="Hledej v názvech" title="Hledej v názvech">
          </div>

          <div class="col-md-2">
            <input type="text" class="hledej form-control" id="myInput1" onkeyup="mySearchColumnFunction(1)" placeholder="Hledej v plných názvech" title="Hledej v plných názvech">
          </div>

          <div class="col-md-2">
            <input type="text" class="hledej form-control" id="myInput2" onkeyup="mySearchColumnFunction(2)" placeholder="Hledej v plných popisech" title="Hledej v plných popisech">
          </div>

          <div class="col-md-2">
            <input type="text" class="hledej form-control" id="myInput3" onkeyup="mySearchColumnFunction(3)" placeholder="Hledej v cílové skupině" title="Hledej v cílové skupině">
          </div>

          <div class="col-md-2">
            <input type="text" class="hledej form-control" id="myInput4" onkeyup="mySearchColumnFunction(4)" placeholder="Hledej v souvisejících kategoriích" title="Hledej v souvisejících kategoriích">
          </div>
        -->
        </div>

        <br>

        <table id="mySearchTable" class="search_project_table">
            <tr class="mySearchTable_header">
                <th>Název 
                  <br>
                  <input type="text" class="hledej form-control" id="myInput0" onkeyup="mySearchColumnFunction(0)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th>Plný Název 
                  <br>
                  <input type="text" class="hledej form-control" id="myInput1" onkeyup="mySearchColumnFunction(1)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th>Plný Popis 
                  <br>
                  <input type="text" class="hledej form-control" id="myInput2" onkeyup="mySearchColumnFunction(2)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th>Cílová Skupina 
                  <br>
                  <input type="text" class="hledej form-control" id="myInput3" onkeyup="mySearchColumnFunction(3)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th>Související kategorie 
                  <br>
                  <input type="text" class="hledej form-control" id="myInput4" onkeyup="mySearchColumnFunction(4)" placeholder="Hledej ..." title="Hledej ...">
                </th>
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

<script>
//Functions to filter by table columns
function mySearchColumnFunction(columnNumber) {
  var input, filter, table, tr, td, i, txtValue;

  if (columnNumber == 0) {
    input = document.getElementById("myInput0");
  } else if (columnNumber == 1) {
    input = document.getElementById("myInput1");
  } else if (columnNumber == 2) {
    input = document.getElementById("myInput2");
  } else if (columnNumber == 3) {
    input = document.getElementById("myInput3");
  } else if (columnNumber == 4) {
    input = document.getElementById("myInput4");
  }

  filter = input.value.toUpperCase();
  table = document.getElementById("mySearchTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[columnNumber];//number of column which will be filtered though
    if (td) {
      txtValue = td.textContent || td.innerText;//orig: txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script>
// Function for sorting the table with projects

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("mySearchTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</body>
</html>
