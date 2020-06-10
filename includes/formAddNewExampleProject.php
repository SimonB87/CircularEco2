<br>
<hr>
<br>
<h2>Připojte svůj projekt</h2>
<br>
<form method="post" action="processNewExampleProject.php">

<label for="username"><strong>Username :</strong></label><br>
<input type="text" id="username" name="username"><br><br>

<label for="username"><strong>Password :</strong></label><br>
<input type="password" name="password"><br><br>

<input type="submit" value="Submit">
</form>
<br>
//Plánovaný formulář:<br>
. (-) Username ... autofilled <br>
. (-) UserEmail ... autofilled<br>
. (-) čas podání žádosti ... autofilled<br>
. (-) jméno typového řešení ke kterému se projekt váže - comboBox - standardně to typové řešení, které je nyní zobrazneno je vybráno <br>
. Jméno vzorového projektu - povinné!<br>
. Lokalita projektu - povinné!<br>
. Popis vzorového projektu - povinné!<br>
. (+) Náklady na realizaci<br>
. (+) Právní souvislosti<br>
. Další zdroje1 - web? - povinné!<br>
. (+) Další Zdroje2 - cokoliv?<br>
- (-) status autofilled na (podáno) (jinak schváleno / zamítnuto / vráceno k přepracování)<br>

//TODO:
. Po podání nová obrazovka - místo echo include, kde bude menu a jen infromace pro usera o stavu podání (Děkujeme, či něco se pokazilo).

//TODO:
. založit sekci management podaných řešení
. pro administrátora i pro uživatele
. tabulka s projekty a jejich překlik na detail
<br>
<br>
<hr>
<br>