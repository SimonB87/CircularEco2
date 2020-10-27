<?php
include("includes/head_designed_htmlhead.php");

?>

  <link rel="stylesheet" href="assets/css/projecttablestyle2019.css">
  <link rel="stylesheet" type="text/css" href="assets/libs/footablebootstrap/css/footable.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/checkboxes.css">

</head>
<body>

<?php
include("includes/head_designed_pageheader.php");

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
            echo "Posty: " . $user['num_posts'] . "<br>";
            echo "Lajky: " . $user['num_likes'];
        ?>
        </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-xs-12 col-md-push-1 main_column column extraDarkBack">

  <div class="project_table">

      <br>
        <input type="text" id="mySearchInput" onkeyup="mySearchFunction()" placeholder="Hledej v projektech.." title="Hledat v projektech">
      <br>

      <br>

      <div class="table-wrapper">

      <div class="row actionButtons" style="width:100%;text-align: center;">
          <div class="actionButtons--itemWrapper col-sm-12 col-md-4 col-lg-4 col-xl-4">
           <button type="button" class="btn btn-success" onclick="setAllSolutionCheckboxes(true);">Přidat všechna řešení <i class="far fa-file-pdf"></i></button>
          </div>
          <div class="actionButtons--itemWrapper col-sm-12 col-md-4 col-lg-4 col-xl-4">
           <button type="button" class="btn btn-primary"><a href="/../sollution/solutionmpdfbatch.php?types=[1002,1003,1203,1204,2202,2204,1105,2003,2303,1103,1207,2002,1201,2102,1001,1107,1102,1101,1205,2103,1106,2301,1104,1202,2201,1302,2001,1206,1303,1301,2203,2101,1006,1004,1005,2302,2304]" target="_blank" style="text-decoration:none;color:#fff;"> 
           Stáhnout všechna řešení v katalogu <i class="far fa-file-pdf"></i></a></button>
          </div>
          <div class="actionButtons--itemWrapper col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <button type="button" class="btn btn-warning" onclick="setAllSolutionCheckboxes(false);">Pročistit výběr řešení</button>
          </div>
        </div>

        <table id="mySearchTable" class="table tableDesign2019 search_project_table">
          <tbody>
              <tr class="mySearchTable_header">
                <th>Plný název 
                  <br>
                  <span><i>Seřadit</i></span> <!-- onclick="sortTable(0)" -->
                  <br>
                  <input type="text" class="hledej form-control" id="myInput0" onkeyup="mySearchColumnFunction(0)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th data-breakpoints="xs sm md">Plný popis 
                  <br>
                  <span><i>Seřadit</i></span> <!-- onclick="sortTable(1)" -->
                  <br>
                  <input type="text" class="hledej form-control" id="myInput1" onkeyup="mySearchColumnFunction(1)" placeholder="Hledej ..." title="Hledej ...">
                </th>

                <th data-breakpoints="xs sm">Kategorie
                  <br>
                  <span><i>Seřadit</i></span> <!-- onclick="sortTable(2)" -->
                  <br>
                  <input type="text" class="hledej form-control" id="myInput4" onkeyup="mySearchColumnFunction(2)" placeholder="Hledej ..." title="Hledej ...">
                </th>

                <th data-breakpoints="xs sm">Cílová skupina 
                  <br>
                  <span><i>Seřadit</i></span> <!-- onclick="sortTable(3)" -->
                  <br>
                  <input type="text" class="hledej form-control" id="myInput2" onkeyup="mySearchColumnFunction(3)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th data-breakpoints="xs sm md">Související kategorie 
                  <br>
                  <span><i>Seřadit</i></span> <!-- onclick="sortTable(4)" -->
                  <br>
                  <input type="text" class="hledej form-control" id="myInput3" onkeyup="mySearchColumnFunction(4)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th data-breakpoints="xs">Využitelné produkty
                  <br>
                  <span><i>Seřadit</i></span> <!-- onclick="sortTable(5)" -->
                  <br>
                  <input type="text" class="hledej form-control" id="myInput4" onkeyup="mySearchColumnFunction(5)" placeholder="Hledej ..." title="Hledej ...">
                </th>
                <th class="headerIcon">
                  <a id="pdfBatchDownload" class="pdfDownloadLink" target="_blank" href="#" solutions=""> 
                    <button type="button" class="btn btn-primary" >
                      Stáhnout <br>vybraná <br>řešení <br> 
                      <span class="pdfIcon headerIcon textCenter">
                        <i class="far fa-file-pdf"></i> 
                      <span>
                    </button>
                  </a> 
                </th>
            </tr>

            <?php
            //conect to the database
 
            //in case of error during conecting to the database display error

            //if ($con-> conect_error) {
            //    die("conection Failed:". $con-> conect_error);
            //}

            //truncate a string only at a whitespace (by nogdog)
            function truncate($text, $length) {
              $length = abs((int)$length);
              if(strlen($text) > $length) {
                $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
                return($text);
              }
              return($text);
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
            $sql = "SELECT id, web_nazev, kategorie, plny_nazev, plny_popis, cilova_skupina, souvisejici_kategorie, vyuzitelne_produkty from typova_reseni ORDER BY plny_nazev ASC";
            //variable to catch the results
            $results = $con-> query($sql);
            //function to fatch the data
            if ($results-> num_rows > 0 ) {
                while ($row = $results-> fetch_assoc()) {

                    $rowEdit_plny_popis = truncate($row["plny_popis"], 600);
                    $rowEdit_vyuzitelne_produkty = truncate($row["vyuzitelne_produkty"], 600);
                    
                    echo "<tr><td><strong> <a href='projecdetail.php?projectnumber=".$row["id"]."'>".$row["plny_nazev"]."</a></strong></td><td>".$rowEdit_plny_popis."</td> <td>".$row["kategorie"]."</td> <td>".$row["cilova_skupina"]."</td><td>".$row["souvisejici_kategorie"]."</td><td>". $rowEdit_vyuzitelne_produkty ."</td>" . 
                    "<td> <input type='checkbox' id='type_" . $row["id"] . "' onclick='addTypeIDtoLink(" . $row["id"] . ")' name='Typ_". $row["id"] ."' solutionid='". $row["id"] ."' class='includeSolutionToPdf'>" .
                    "<label class='labelAddToPDF' onclick='clickCheckbox(". $row["id"] .");' for='typ_". $row["id"] ."'><span class='addToPDF '> <i class='fas fa-plus plusIcon addIcon'></i> <i class='far fa-file-pdf pdfIcon checkboxIcon'></i> </span></label></td>" .
                    "</tr>";
                }
                echo "";
            }
            else {
                echo "0 result";
            }
            //Close the variable after finishing
            $con-> close();

            ?>

          </tbody>
        </table>
      </div>
    </div>


</div>


</div> <!-- closing of the wrapper div, this div stars in the included header file-->

<script src="assets/js/projectSearchTable.js"></script>

<script src="assets/libs/footablebootstrap/js/footable.js" defer></script>
<script defer>
jQuery(function($){
    $('.table').footable();
  });
/*
Sollution guide 15.10.2020: http://fooplugins.github.io/FooTable/docs/examples/basic/single-header.html
*/
</script>
<script src="assets/js/createPdfBatchLink.js" defer></script>

</body>
</html>
