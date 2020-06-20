<?php
header('Content-Type: text/html; charset=utf-8');

$to				= 	"spravce@obcevkruhu.cz";
$subject	=		"Máme novou žádosti o vložení příkladu z praxe do katalogu - Platforma www.obcevkruhu.cz";

$message_head	=	"<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'>" .
                "<p>Krásný den, </p><p>na platformu www.obcevkruhu.cz dorazila nová žádosti o vložení příkladu z praxe do katalogu.</p></div><br>";

$message_body = "<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'> <p>Žádost zaslal uživatel: <br>" .
              "Jméno: <b>" . $prefilled_firstName . " " . $prefilled_lastName . 
              "</b>, profil: <a href='http://obcevkruhu.cz/testsubmissions/" . $prefilled_userName . "'> " . $prefilled_userName . 
              "</a>(pozn.: pro zobrazení profilu se musíte nejdříve přihlásit). <br><br>" .
              "Podobnosti o příkladu dobré praxe: <br> <br>" .
              "Název příkladu: <b>" . $projectName . "</b> <br><br>" .
              "Lokalita příkladu: <b>" . $projectLocality . "</b> <br><br>" .
              "<b>Popis příkladu:</b> " . $projectDescription . " <br><br>" .
              "<b>Odkaz na příklad:</b> " . $projectReferenceMain . "</p> </div><br><br>";

$message_footer =  "<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'>"  . 
              "<p>Další podrobnosti příkladu najdete na platformě. Prosíme, aby ste se žádosti věnovali v nejbližší době. </p><br><br><br>" .

              "<p><b>POKYNY PRO ADMINISTRACI:</b> Podanou žádost najdete v " . 
              " <a href='http://obcevkruhu.cz/testsubmissions/manage.php'> Sekce pro administrátora </a> ve správě podaných žádostí <br><br>" .
              " Zde najdete v podsekci 'Nové žádosti' novou žádost. <br><br>" .
              "Klikněte na název žádosti pro to, abyste si ji mohli celou projít. <br><br>" .
              "Následně doplňte Vaše vyjádření k žádosti a změňte její status. </p><br><br>" .

              "<p>a) 0 Zamítnuto > Tento projekt bude rovnou zamítnut a proces tímto končí. <br><br>" .
              "b) 2 Vráceno k přepracování > Žádost musí subjekt upravit, po jeho úpravách se objeví v sekci 'Přepracováno'. <br><br>" .
              "c) 9 Schváleno > Projekt se objeví u daného typového řešení jako další příklad dobré praxe. </p><br><br> <br>" .

              "<p>Děkujeme za spolupráci. :-) <br><br>" .
              "INFO: Tato zpráva byla automaticky generována algorytmem. <br><br>"  . 
              "[ Šimon Buryan 20.06.2020 ]" . "</p></div>";

$message = $message_head . $message_body . $message_footer;
              
$replyto	=		"From: " . $prefilled_email . " \n\r" . "Reply-To:" . $prefilled_email . " \n\r";

$headers = "Content-Type: text/html; charset=UTF-8";

if (mail($to, $subject, $message, $headers)) {
  echo "<h4>Žádost byla odeslána.</h4> <p>Děkujeme za využití našich služeb.</p>";
} else {
  echo "<h4>Objevila se chyba.</h4> <p>Informujte případně správce.</p>";
}

?>
