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
    echo "Posts: " . $user['num_posts'] . "<br>";
    echo "Likes: " . $user['num_likes'];
    ?>
  </div>

</div>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">
  <div class="projekty-back">
    <h2 class="projekty-back-title">Cirkulární projekty</h2>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 style="text-align: center;">Pronájem služeb a produktů namísto nákupu</h2>

      <h3>
        <?php
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $position_in_string = strpos($actual_link, "number=");
        $project_number = substr($actual_link, $position_in_string + 7);
        echo "Testing project number: <span style='color:red'>" . $project_number ."</span>";
        ?>

      </h3>

    </div>
  </div>

  <div class="row oblast-selection">
      <div class="col-md-12">

        <table id="project-detail">
          <tr>
            <td><p><strong>Oblast: </strong></p></th>
            <td>
              <p><strong style="color: #057705;">Nakupování<strong></p>
            </th>

          </tr>

          <tr>
            <td><p><strong>Popis: </strong></p><p>Včetně environmentálních dopadů</p></th>
            <td>
              <p>Pronájem nakupovaných produktů se smluvním odběrem a zajištění recyklace po jejich skutečném nebo morálním zastarání/dožití.</p>
              <p>Povinnost zajištění opětovného využití nebo recyklace přejde z obce na dodavatele, jenž má předpoklady pro využití produktů, které sám vyrábí nebo dodává.</p>
              <p>V podstatě jde o rozšiřování a zdokonalení systému zpětného odběru. Poskytovatel díky internímu systému ekodesignu a recyklací vlastních produktů může dosáhnout velmi vysoké efektivity recyklace, resp. opětovného použití výrobků.</p>
            </th>

          </tr>
          <tr>
            <td><p><strong>Podmínky využití/bariéry: </strong></p></td>
            <td>
              <p>
                <ul class="project-detail-ulList">
                  <li>Existence vhodného dodavatele nabízejícího uvedenou službu</li>
                  <li>Dlouhodobá existence dodavatele v případě dlouhodobých investic (stavební prvky atd.)</li>
                </ul>
              </p>
            </td>

          </tr>
          <tr>
            <td><p><strong>Podmínky využití/bariéry: </strong></p></td>
            <td>
              <p> např.:
                <ul class="project-detail-ulList">
                  <li>Stavební materiály - okna, tepelné izolace, vnitřní vybavení – sanitární prvky</li>
                  <li>Mobiliář – lavičky, odpadkové koše, prvky dětských hřišť</li>
                  <li>Inženýrské sítě</li>
                  <li>Elektronika – počítače, požární a zabezpečovací systémy</li>
                  <li>Osvětlení</li>
                </ul>
              </p>
            </td>

          </tr>
          <tr>
            <td><p><strong>Využitelné typy produktů/ odpadů: </strong></p></td>
            <td><p>texty</p></td>

          </tr>
          <tr>
            <td><p><strong>SWOT analýza: </strong></p></td>
            <td>
              <p><strong>Silné stránky: </strong> dožilé produkty se dostanou přímo producentům, snížení nároků na obec v odpadovém hospodářství, maximalizace úrovně recyklace </p>
              <p><strong>Slabé stránky: </strong> zatím nezažitý mechanismus – absence dodavatelů, pravděpodobně vyšší cena produktů, tendence k závislosti na jednom dodavateli </p>
              <p><strong>Příležitosti: </strong> zvýšení přidané hodnoty dodavatelů, zajištění dlouhodobých kontraktů, vznik nových sdružení výrobců, zvýšení počtu pracovních míst na zpracování odebraných dožilých produktů, větší příležitosti pro lokální dodavatele </p>
              <p><strong>Hrozby: </strong> ekonomická neudržitelnost systému, zánik dodavatelů bez splnění dlouhodobých závazků, problémy s využitím odebraných dožilých produktů </p>
            </td>

          </tr>
          <tr>
            <td><p><strong>Cílová skupina:: </strong></p></td>
            <td><p>Obce, podnikatelé </p></td>

          </tr>
          <tr>
            <td><p><strong>Ekonomické podmínky a přínosy: </strong></p></td>
            <td>
              <p>Pravděpodobně vyšší nároky než současný stav, ovšem směřující k rovnovážnosti se zvyšováním nákladů na odstraňování odpadů. Velmi individuální (dle produktů, komplexnosti služby, konkurence).</p>
              <p>Přínos – minimalizace nákladů na údržbu.</p>
            </td>

          </tr>
          <tr>
            <td><p><strong>Personální náročnost: </strong></p></td>
            <td><p>Snížení personální náročnosti na zástupce obcí (v odpadovém hospodářství a údržbě), zvýšení náročnosti pro dodavatele (potenciálně vyšší zaměstnanost, zvětšení rozsahu podnikání).</p></td>

          </tr>
          <tr>
            <td><p><strong>Právní aspekty: </strong></p></td>
            <td>
              <p>Konkrétní ustanovení mohou vycházet z aktuální (budoucí) legislativy, ale jde o smluvní vztah mezi dodavatelem a odběratelem.</p>
              <p>Bude se jednat o dlouhodobé, poměrně složité smlouvy zaručující kontrolovatelné podmínky provozu.</p>
            </td>

          </tr>
          <tr>
            <td><p><strong>Příklad z praxe: </strong></p></td>
            <td>
              <p>Elektronika –  www.bestcena.cz
              <p>Služba nabízí fotoaparáty, mobilní telefony a televizory o stovky až tisíce korun levněji než u konkurence. Tento prodejce nedávno přišel na český trh ze Slovenska. S označením „prodejce“ je však potřeba zacházet opatrně. Po přečtení obchodních podmínek zákazník totiž zjistí, že si zboží nekupuje, ale dlouhodobě pronajímá.
              <p>Provozovatel služby, za níž stojí slovenská společnost Bestcena SE, slibuje zákazníkům podmínky, jako by si produkt zakoupili. Zákazník má záruku 24 měsíců, 14 dní na vrácení zboží bez udání důvodu, a navíc mu poskytují expresně rychlou záruční opravu či výměnu a možnost vrátit zboží kdykoliv.
              <p>Vybrané zboží lze vložit do „nákupního košíku“, který zná z e-shopů. Za zboží zaplatí částku, jež je nižší než cena v běžném prodeji. Nejedná se však o úhradu, ale o „kauci“, z níž si provozovatel strhává roční „nájem“ ve výši 50 haléřů.
              <p>Hlavní rozdíl oproti tradičnímu prodeji spočívá ve způsobu odvodu DPH. Společnost pak platí DPH pouze z nájmu, nikoliv však z kauce samotné. Díky tomu může nabídnout nižší ceny.
              <p>https://www.idnes.cz/ekonomika/domaci/nakup-pres-internet-bez-dph.A140922_204216_ekonomika_bse
              <br>
              <p>www.bestcena.cz
              <br>
              <p>Tisk – www.tomados.cz
              <p>Realizují profesionální a současně cenově dostupná tisková řešení přímo na míru, a to jak v případě prodeje, tak i v případě pronájmu tiskáren. Nabízí k pronájmu prvotřídní multifunkční zařízení od malých tiskáren formátu A4 až po velká tisková zařízení. Pronájem tiskáren je možné sjednat i na dobu neurčitou, a to za stejných finančních podmínek jako na dobu určitou, není třeba se tedy obávat doplácení finančních závazků při případné předčasné výpovědi smlouvy.
              <p>www.tomados.cz
              <br>
              <p>COPYMAT
              <p>Pronájem kopírovacích zařízení lze zvolit na 12, 24 nebo 36 měsíců. Po uplynutí pronájmu a převedení stroje do svého vlastnictví lze využít dalších výhodných služeb jako SM smlouvu nebo SLA smlouvu, jestliže je stroj závislý na firemním softwaru.
              <p>www.copymat.cz
              <br>
              <p>Po celou dobu pronájmu je stroj v záruce a spotřební materiál v ceně pronájmu. Nemusí se tak řešit vlastní nákup spotřebního materiálu, technik ho doveze až ke stroji. Součástí smlouvy je i bezplatná výměna dílů spotřebního charakteru, na které se standardně záruka nevztahuje, například válcové jednotky.
              <br>
              <p>Několik výhod proč mít pronájem:
              <ul class="project-detail-ulList">
                <li> Neměnná částka po dobu trvání smlouvy</li>
                <li> Údržba a servis stroje zdarma</li>
                <li> Záruka na stroj po dobu trvání smlouvy</li>
                <li> Zvýšená záruka na náhradní díly</li>
                <li> Možnost dovybavení stroje po dobu smlouvy za výhodné ceny</li>
                <li> Spotřební materiál zdarma</li>
                <li> Po uplynutí smlouvy lze za převodní poplatek ve výši 500 Kč stroj odkoupit do svého vlastnictví</li>
                <li> Jako zákazníci získáte zjednodušené online hlášení servisu</li>
              </ul>
              <br>
              <p>Philips (Circular Lightning)
              <p>Jedná se o princip, kdy lidé nekupují světelné zdroje, ale kupují pouze službu osvětlení obcí, měst, staveb, kanceláří, domů. Společnost nabízí řešení na klíč – návrh osvětlení, konzultace, výstavbu, samotný provoz, údržbu, potřebné modernizace, ale především poskytuje služby na konci životnosti osvětlení. Výhodou je, že klient nemusí na počátku investovat do zařízení a o nic se starat, jedná se o tzv. flexibilní řešení financování, čili opravdu nejsou třeba žádné investice.

            </td>

          </tr>

        </table>

      </div>
    </div>





</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>
