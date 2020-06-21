<?php
header('Content-Type: text/html; charset=utf-8');

$to				= 	"spravce@obcevkruhu.cz";
$subject	=		"Byl úspěšně zvěřejněn nový případ dobré praxe - Platforma www.obcevkruhu.cz";

$message_head	=	"<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'>" .
                "<p>Krásný den, </p><p> platforma www.obcevkruhu.cz má další nově schválený příklad dobré praxe.</p></div><br>";
$message_body = "<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'>" .
                "<h4>ID příkladu dobré praxe</h4> <p>" . $prefilled_id . "</p>" .
                "<h4>Název příkladu dobré praxe</h4> <p>" . $prefilled_projectName . "</p>" .
                "</div><br>";
$message_footer =  "<div style='max-width: 550px; margin: 0 auto; line-height: 1.5rem; font-size: 0.9rem;'>"  . 
              "<p>Děkujeme za spolupráci. :-) <br><br>" .
              "INFO: Tato zpráva byla automaticky generována algorytmem. <br><br>"  . 
              "[ Šimon Buryan 21.06.2020 ]" . "</p></div>";

$message = $message_head . $message_body . $message_footer;
              
$replyto	=		"From: " . $prefilled_email . " \n\r" . "Reply-To:" . $prefilled_email . " \n\r";

$headers = "Content-Type: text/html; charset=UTF-8";

if (mail($to, $subject, $message, $headers)) {
  //test
  //echo "<h4>Email odeslán.</h4> <p>v pořádku.</p>";//test
} else {
  //test
  echo "<p>Chyba! Email neodeslán<p>";//test
}

?>
