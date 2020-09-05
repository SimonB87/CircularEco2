<?php
//TODO - set UTF 8 according to http://zaachi.com/2008/09/02/fpdf-jak-na-ceske-znaky.html

//set initial PDF library - this has to be on top of the file
require("../sollution/includes/fpdf182/fpdf.php");
class PDF extends FPDF
{
  // Page header
  function Header()
  {
    // Logo
    $this->Image("../sollution/includes/fpdf182/logoprint.png",10,6,20);
    // Arial bold 15
    $this->AddFont('ArialCZ','B','opensansbold.php');
    $this->SetFont('ArialCZ','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(50,10,'Obcevkruhu.cz',1,0,'C');
    // Line break
    $this->Ln(15);
    $this->SetFont('Arial','B',10);
    $this->Cell(0, 10, $this->title, 0, 0, 'C');
    $this->Ln(10);
  }

  // Page footer
  function Footer()
  {
    // Position at 1.5 cm from bottom
    $this->SetY(-42);
    $this->Ln(13);
    // Arial italic 8,
    $this->AddFont('ArialCZ','','opensansregular.php');
    $this->SetFont('ArialCZ','',8);
    $this->Cell(0,15,'www.Obcevkruhu.cz',0,0,'C');
    // Url in footer
    $this->Ln(6);
    $this->Cell(0, 10, $this->urlLink, 0, 0, 'C');
    // Page number
    $this->Ln(6);
    $this->Cell(0,10,'Strana '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
$pdf = new PDF();

//! this is custom for each built location!
require '../sollution/config/config2.php';

// security function for injections
$link = $con;
$actual_link = "Odkaz: " . mysqli_real_escape_string($link,"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

  //url for footer inside bottom of page
  $pdf->urlLink = $actual_link;

$position_in_string = strpos($actual_link, "number=");
$project_number = substr($actual_link, $position_in_string + 7);
$project_number = mysqli_real_escape_string($link, $project_number);
// just work with first 5 characters
$project_number = substr($project_number, 0, 5);

//conect to the database

if($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

//print the used character set - just for testing
//printf("Initial character set: %s\n", mysqli_character_set_name($con));

// change character set to utf8 - before "utf8"
if (!mysqli_set_charset($con, "utf8")) {
      printf("Error loading character set utf8: %s\n", mysqli_error($con));
      exit();
} else {
      //printf("Current character set: %s\n", mysqli_character_set_name($con));//used only for testing
}

//prepare variables to store values
$projectInfo_plnyNazev = "";
$projectInfo_kategorie = "";
$projectInfo_popis = "";
$projectInfo_podminky = "";
$projectInfo_vyuzitelneProdukty = "";
$projectInfo_swot = "";
$projectInfo_cilovaSkupina = "";
$projectInfo_ekonomickePodminky = "";
$projectInfo_personal = "";
$projectInfo_pravni = "";
$projectInfo_prikladyPraxe = "";
$projectInfo_souvisejiciKategorie = "";


//Select columns named from "a" to "e" from a database
$sql = "SELECT kategorie, plny_nazev, plny_popis, podminky_vyuziti, vyuzitelne_produkty, SWOT_analyza, cilova_skupina, ekonomicke_podminky, personálni_narocnost, pravni_aspekty, priklad_praxe, souvisejici_kategorie FROM projety_ce WHERE id='$project_number'";
//variable to catch the results
$results = $con-> query($sql);
//function to fatch the data
if ($results-> num_rows > 0 ) {
  while ($row = $results-> fetch_assoc()) {

    $projectInfo_plnyNazev = $row["plny_nazev"];
    $projectInfo_kategorie = $row["kategorie"];
    $projectInfo_popis = $row["plny_popis"];
    $projectInfo_podminky = $row["podminky_vyuziti"];
    $projectInfo_vyuzitelneProdukty = $row["vyuzitelne_produkty"];
    $projectInfo_swot = $row["SWOT_analyza"];
    $projectInfo_cilovaSkupina = $row["cilova_skupina"];
    $projectInfo_ekonomickePodminky = $row["ekonomicke_podminky"];
    $projectInfo_personal = $row["personálni_narocnost"];
    $projectInfo_pravni = $row["pravni_aspekty"];
    $projectInfo_prikladyPraxe = $row["priklad_praxe"];
    $projectInfo_souvisejiciKategorie = $row["souvisejici_kategorie"];

  }
  echo "";
}
else {
  echo "<h3 style='text-align: center; color: coral'>Projekt s vybraným číslem není v databázi. Vyberte existující projekt!</h3>";
}
//Close the variable after finishing
$con-> close();


//$projectInfo_plnyNazev = str_replace("<br>","",utf8_decode($projectInfo_plnyNazev));
//$projectInfo_popis = str_replace("<br>","",utf8_decode($projectInfo_popis));
$projectInfo_plnyNazev = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_plnyNazev)); //$projectInfo_plnyNazev = str_replace("<br>","",iconv("UTF-8", "ISO-8859-2//TRANSLIT", $projectInfo_plnyNazev));
$projectInfo_popis = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_popis)); //$projectInfo_popis = str_replace("<br>","",iconv("UTF-8", "ISO-8859-2//TRANSLIT", $projectInfo_popis));
//$projectInfo_plnyNazev = iconv('UTF-8', 'windows-1250', $projectInfo_plnyNazev); // iconv -i UTF-8 -t WINDOWS-1250
//$popis = iconv('UTF-8', 'windows-1252', $popis);
//$podminky = iconv('UTF-8', 'windows-1252', $podminky);

$projectInfo_podminky = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_podminky));
$projectInfo_vyuzitelneProdukty = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_vyuzitelneProdukty));
$projectInfo_swot = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_swot));
$projectInfo_cilovaSkupina = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_cilovaSkupina));
$projectInfo_ekonomickePodminky = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_ekonomickePodminky));
$projectInfo_personal = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_personal));
$projectInfo_pravni = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_pravni));
$projectInfo_prikladyPraxe = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_prikladyPraxe));
$projectInfo_souvisejiciKategorie = str_replace("<br>","",iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_souvisejiciKategorie));


//add custom fonts
$pdf->AddFont('ArialCZ','','opensansregular.php');
$pdf->AddFont('ArialCZ','B','opensansbold.php');

//title for header on top of page
$projectInfo_plnyNazev_label = "Typové řešení: ";
$pdf->title = iconv("UTF-8", "windows-1252//TRANSLIT", $projectInfo_plnyNazev_label) . $projectInfo_plnyNazev; //$pdf->title = iconv("UTF-8", "ISO-8859-2//TRANSLIT", "Typové řešení: ") . $projectInfo_plnyNazev;


$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("PLNÝ NÁZEV") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_plnyNazev);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("POPIS PROJEKTU") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_popis);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . iconv("UTF-8", "windows-1252//TRANSLIT","PODMÍNKY VYUŽITÍ") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_podminky);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . iconv("UTF-8", "windows-1252//TRANSLIT","VYUŽITELNÉ PRODUKTY") . "\n" ));
$pdf->SetFont('Arial','',12);
$pdf->Write(8,$projectInfo_vyuzitelneProdukty);

$pdf->SetFont('Arial','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("SWOT ANALÝZA") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_swot);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("CÍLOVÁ SKUPINA") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_cilovaSkupina);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("EKONOMICKÉ PODMÍNKY") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_ekonomickePodminky);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . iconv("UTF-8", "windows-1252//TRANSLIT","PERSONÁLNÍ NÁROČNOST") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_personal);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("PRÁVNÍ ASPEKTY") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_pravni);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . iconv("UTF-8", "windows-1252//TRANSLIT","PŘÍKLADY DOBRÉ PRAXE") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_prikladyPraxe);

$pdf->SetFont('ArialCZ','B',16);
$pdf->Write(8,("\n" . "\n" . utf8_decode("SOUVISEJÍCÍ KATEGORIE") . "\n" ));
$pdf->SetFont('ArialCZ','',12);
$pdf->Write(8,$projectInfo_souvisejiciKategorie);

//add content to PDF
$pdf->Output();

?>
