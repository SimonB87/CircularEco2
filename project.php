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
  <div class="projekty-back">
    <h2 class="projekty-back-title">Cirkulární projekty</h2>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h4>Výběr oblastí</h4>
    </div>
  </div>
  <div class="row oblast-selection">
      <div class="col-md-12">
        <button type="button" class="btn btn-default btn-success oblast1">Nakupování</button>
        <button type="button" class="btn btn-default btn-success oblast2">Opětovného využití</button>
        <button type="button" class="btn btn-default btn-success oblast3">Voda</button>
        <button type="button" class="btn btn-default btn-success oblast4">Podnikání</button>
        <button type="button" class="btn btn-default btn-success oblast5">BRO</button>
        <button type="button" class="btn btn-default btn-success oblast6">Doprava</button>
        <button type="button" class="btn btn-default oblast7">Odpady</button>
        <button type="button" class="btn btn-default oblast8">Inovace</button>
        <button type="button" class="btn btn-info"><a href="tableprojects.php" rel="Projekty podrobně">Prohledat projekty</a></button>
      </div>
    </div>


  <div class="projekty-oblast-1">
  <section class="container p-t-3" style="width:100%;">
      <div class="row">
          <div class="col-lg-12">
            <h1>Oblast <span style="color: #057705;">nakupování</span></h1>
          </div>
      </div>
  </section>

  <div id="myCarousel1" class="carousel slide projectCarousel" style="min-height:100px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item-visual item1 active" itemnumber="1" carouselnumber="1"></li>
      <li class="item-visual item2" itemnumber="2" carouselnumber="1"></li>
      <li class="item-visual item3" itemnumber="3" carouselnumber="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      	<div class="item-wrapper">
          <div class="col-md-4 item-in-num">
              <div class="card">             
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1001"><h3>Pronájem služeb a produktů namísto nákupu</h3></a></div>
                      <div class="card-text">Pronájem nakupovaných produktů se smluvním odběrem a zajištění recyklace po jejich skutečném nebo morálním zastarání/dožití.</div>
                  </div>

              </div>
          </div>
          <div class="col-md-4 item-in-num">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/recycle.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1002"><h3>Bezobalové hospodářství – obecní akce</h3></a></div>
                      <div class="card-text">Snižování spotřeby obalů v rámci průběžné i mimořádné činnosti obce...</div>
                  </div>
              </div>
          </div>
          <div class="col-md-4 item-in-num">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1003"><h3>Bezobalové hospodářství – sjednocování objednávek</h3></a></div>
                      <div class="card-text">Snižování spotřeby obalů v rámci průběžné i mimořádné činnosti obce, a to sjednocením objednávek zboží (kancelářské potřeby, potraviny apod.) do 1 balení, hromadné nakupování na delší období.</div>
                  </div>
              </div>
          </div>
        </div>
        <!--<img src="img_chania.jpg" alt="Chania" width="460" height="345">-->
      </div>

      <div class="item next">
        <div class="item-wrapper">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"> <a href="projecdetail.php?projectnumber=1004"> <h3>Zelené úřadování</h3> </a> </div>
                      <div class="card-text">Jednoduchá úsporná opatření související s běžnou kancelářskou agendou obce...</div>
                  </div>
              </div>
          </div>
         <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"> <a href="projecdetail.php?projectnumber=1005"> <h3>Zelené veřejné zakázky</h3> </a> </div>
                      <div class="card-text">Zelené úřadování je zkrácený název pro ekologický provoz institucí financovaných z veřejných prostředků, jako jsou např. obecní, městské či krajské úřady, školy, školky, penziony pro důchodce, kulturní centra.</div>
                  </div>
              </div>
          </div>
         <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"> <a href="projecdetail.php?projectnumber=1006"> <h3>Zelená péče o veřejná prostranství</h3> </a> </div>
                      <div class="card-text">Nechemické odstraňování plevelů na veřejných prostranstvích a využití mechanických (manuálních) prostředků pro údržbu zeleně (kosy, vřetenové sekačky).</div>
                  </div>
              </div>
          </div>
        </div>
      </div>

      <div class="item">
      <div class="col-md-4">
             <div class="card">
                 <div class="card-img-top card-img-top-250">
                     <div class="project-blank" style="background:#057705;height:92px;display:flex;align-items: center;"><i class="fas fa-forward" style="color:#fff;margin: 0 auto;font-size:20px"></i></div>
                 </div>
                 <div class="card-block p-t-2">
                     <div class="card-header"><h3>Hledat další projekty</h3></div>
                     <div class="card-text">Další projekty se nacházejí v archivu</div>
                 </div>
             </div>
         </div>
      </div>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#" role="button" carouselnumber="1">
      <span class="nextleft" aria-hidden="true"> <i class="fa fa-lg fa-chevron-left"></i> </span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#" role="button" carouselnumber="1">
      <span class="nextright" aria-hidden="true"> <i class="fa fa-lg fa-chevron-right"></i> </span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 
</div>

  <div class="projekty-oblast-2">
  <section class="container p-t-3" style="width:100%;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Oblast <span style="color: #057705;">opětovného využití</span></h1>
        </div>
    </div>
  </section>

  <div id="myCarousel2" class="carousel slide projectCarousel" style="min-height:100px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item-visual item1 active" itemnumber="1" carouselnumber="2"></li>
      <li class="item-visual item2" itemnumber="2" carouselnumber="2"></li>
      <li class="item-visual item3" itemnumber="3" carouselnumber="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      	<div class="item-wrapper">
          <div class="col-md-4 item-in-num">
              <div class="card">             
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1101"><h3>Sběr textilu a oděvů v obci</h3></a></div>
                      <div class="card-text"> Obnošené oděvy a boty, nevyužívané kusy oděvů je možné využít pro sociálně znevýhodněné obyvatele. Pro sběr textilu a bot slouží speciální kontejnery.</div>
                  </div>

              </div>
          </div>
          <div class="col-md-4 item-in-num">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/recycle.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1102"><h3>RE – USE centra, Opravny produktů (nábytek, elektronika)</h3></a></div>
                      <div class="card-text">Vznik opraven, kde by se renovovaly, opravovaly, vyměňovaly díly u rozličných produktů používaných v domácnostech.</div>
                  </div>
              </div>
          </div>
          <div class="col-md-4 item-in-num">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1103"><h3>Organizování bleších trhů, obecní burzy</h3></a></div>
                      <div class="card-text">Výměna, darování, prodej rozličných nepotřebných věcí mezi občany – věc neskončí v popelnici a ani na skládce. 3</div>
                  </div>
              </div>
          </div>
        </div>
        <!--<img src="img_chania.jpg" alt="Chania" width="460" height="345">-->
      </div>

      <div class="item next">
        <div class="item-wrapper">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1104"><h3>Virtuální re-use centrum – nabídka nepotřebných věcí</h3></a></div>
                      <div class="card-text">Jedná se o webové stránky, aplikaci umožňující nabízet nepotřebné věci z domácnosti občanů. Jedním z typů je Knihovna věcí, či el. verze SWAP (směnný obchod).</div>
                  </div>
              </div>
          </div>
         <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1105"><h3>Nabídka stavebních materiálů před demolicí staveb v obci</h3></a></div>
                      <div class="card-text">Zelené úřadování je zkrácený název pro ekologický provoz institucí financovaných z veřejných prostředků, jako jsou např. obecní, městské či krajské úřady, školy, školky, penziony pro důchodce, kulturní centra.</div>
                  </div>
              </div>
          </div>
         <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><a href="projecdetail.php?projectnumber=1106"><h3>SWAP – výměna zboží, materiálu, výrobku, směnný obchod</h3></a></div>
                      <div class="card-text">Vyměňuje se vše za vše – dáte své věci na stůl, na zem nebo do krabic a sami si vybíráte, co by se vám hodilo z kousků přinesených ostatními.</div>
                  </div>
              </div>
          </div>
        </div>
      </div>

      <div class="item">
      <div class="col-md-4">
             <div class="card">
                 <div class="card-img-top card-img-top-250">
                     <div class="project-blank" style="background:#057705;height:92px;display:flex;align-items: center;"><i class="fas fa-forward" style="color:#fff;margin: 0 auto;font-size:20px"></i></div>
                 </div>
                 <div class="card-block p-t-2">
                     <div class="card-header"><h3>Hledat další projekty</h3></div>
                     <div class="card-text">Další projekty se nacházejí v archivu</div>
                 </div>
             </div>
         </div>
      </div>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#" role="button" carouselnumber="2">
      <span class="nextleft" aria-hidden="true"> <i class="fa fa-lg fa-chevron-left"></i> </span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#" role="button" carouselnumber="2">
      <span class="nextright" aria-hidden="true"> <i class="fa fa-lg fa-chevron-right"></i> </span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="projekty-oblast-3">
    <section class="container p-t-3" style="width:100%;">
      <div class="row">
          <div class="col-lg-12">
              <h1>Oblast <span style="color: #057705;">vody</span></h1>
          </div>
      </div>
    </section>

  <section class="carousel3 slide" data-ride="carousel" id="postsCarousel">
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-4" >
              <a class="btn btn-outline-secondary prev3" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
              <a class="btn btn-outline-secondary next3" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
          </div>
      </div>
  </div>
  <div class="container p-t-0 m-t-2 carousel-inner">
      <div class="row row-equal item active m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Využití vod z ČOV v zemědělství</h3></div>
                      <div class="card-text">Jedná se o inovativní způsob využití již vyčištěné odpadní vody, která je na výstupu z čistírny odpadních vod. Tato voda i nadále obsahuje zbytkové – stopové živiny, minerální látky. </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/recycle.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Využití dešťové vody k zálivce a vsakování</h3></div>
                      <div class="card-text">Využití dešťové vody k jímání do nádrží a následné využití k zalévání a zavlažování. Alternativou je rozšíření potenciálu vsakování, například vybudováním podzemních vsakovacích prostor.</div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Využití šedých vod z domácností</h3></div>
                      <div class="card-text">Šedou vodou nazýváme podle EN 12056 splaškové odpadní vody neobsahující fekálie a moč, které odtékají z umyvadel, van, sprch, dřezů apod. Šedou vodu, zejména z koupelen, ... </div>
                  </div>
              </div>
          </div>

      </div>
      <div class="row row-equal item m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <div class="project-blank" style="background:#057705;height:92px;display:flex;align-items: center;"><i class="fas fa-forward" style="color:#fff;margin: 0 auto;font-size:20px"></i></div>
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Hledat další projekty</h3></div>
                      <div class="card-text">Další projekty se nacházejí v archivu</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </section>
</div>

<div class="projekty-oblast-4">
  <section class="container p-t-3" style="width:100%;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Oblast <span style="color: #057705;">podnikání</span></h1>
        </div>
    </div>
  </section>

  <section class="carousel4 slide" data-ride="carousel" id="postsCarousel">
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-4" >
              <a class="btn btn-outline-secondary prev4" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
              <a class="btn btn-outline-secondary next4" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
          </div>
      </div>
  </div>
  <div class="container p-t-0 m-t-2 carousel-inner">
      <div class="row row-equal item active m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Podpora místnícho podnikání v CE</h3></div>
                      <div class="card-text">Podpora místních podnikatelů, jejichž činnost přispívá k implementaci cirkulární ekonomiky. Podpora podnikatelů prodávajících vlastní primární produkty, zajišťující opravy... </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Vlastní podnikání obce v cirkulární ekonomice</h3></div>
                      <div class="card-text">Založení vlastní podnikatelské činnosti přispívající k implementaci cirkulární ekonomiky:<ul style="padding:0 10px"><li>Sběr a zpracování odpadu</li> <li>Provoz kompostárny</li> <li>Výroba stavebních recyklátů</li> </ul></div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/recycle.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Energetická efektivita – energetická soběstačnost</h3></div>
                      <div class="card-text">Do cirkulární ekonomiky patří minimalizace dopravy energií. Ta je spojena se ztrátami a nutností regulace přenosových a distribučních sítí.</div>
                  </div>
              </div>
          </div>

      </div>
      <div class="row row-equal item m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Malá bioplynová stanice</h3></div>
                      <div class="card-text">Bioplynové stanice (BPS) přinášejí čistou energetiku, nezávislou na dodávkách paliv z nestabilních zdrojů, diverzifikovanou a tedy bezpečnější.</div>
                  </div>
              </div>
          </div>
         <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Sdílení obecní mechanizace a prostředků – obecní půjčovna</h3></div>
                      <div class="card-text">Jedná se o pronájem mechanizace, strojů, většího nářadí v majetku obce za určitý poplatek občanům. Sdílením prostředků se snižují nároky na přírodní zdroje při výrobě zařízení, ...</div>
                  </div>
              </div>
          </div>
         <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/friendsmeet.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Využití obecních lesů</h3></div>
                      <div class="card-text">Samovýroba dřeva - Samovýrobou se rozumí, že zájemce si sám vyrobí (vytěží), přiblíží a odveze dřevo, které mu určí starosta (nebo pověřený zástupce) za stanovenou úplatu. </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row row-equal item m-t-0">
        <div class="col-md-4">
             <div class="card">
                 <div class="card-img-top card-img-top-250">
                     <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                 </div>
                 <div class="card-block p-t-2">
                     <div class="card-header"><h3>Osvětové akce</h3></div>
                     <div class="card-text">Pravidelné nebo příležitostné informování obyvatel o možnostech využití nástrojů obce pro cirkulární ekonomiku... </div>
                 </div>
             </div>
         </div>

         <div class="col-md-4">
             <div class="card">
                 <div class="card-img-top card-img-top-250">
                     <div class="project-blank" style="background:#057705;height:92px;display:flex;align-items: center;"><i class="fas fa-forward" style="color:#fff;margin: 0 auto;font-size:20px"></i></div>
                 </div>
                 <div class="card-block p-t-2">
                     <div class="card-header"><h3>Hledat další projekty</h3></div>
                     <div class="card-text">Další projekty se nacházejí v archivu</div>
                 </div>
             </div>
         </div>

      </div>
  </div>
  </section>

</div><!-- konec oblasti -->

<div class="projekty-oblast-5">
  <section class="container p-t-3" style="width:100%;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Oblast <span style="color: #057705;">biologicky rozložitelného odpadu</span></h1>
        </div>
    </div>
  </section>

  <section class="carousel5 slide" data-ride="carousel" id="postsCarousel">
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-4" >
              <a class="btn btn-outline-secondary prev5" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
              <a class="btn btn-outline-secondary next5" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
          </div>
      </div>
  </div>
  <div class="container p-t-0 m-t-2 carousel-inner">
      <div class="row row-equal item active m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Využití elektrických gastro-kompostérů</h3></div>
                      <div class="card-text">Elektrický kompostér je alternativa k povinným svozům gastroodpadu. Svoz gastroodpadů je často finančně velmi náročný. </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Podpora kompostování v domácnostech</h3></div>
                      <div class="card-text">Odklon biologicky rozložitelných odpadů ze směsného komunálního odpadu obce.</div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/recycle.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Obecní kompostárna – využití biomasy</h3></div>
                      <div class="card-text">Obecní kompostárna – využití biomasy z údržby veřejné zeleně. Plánování a zafinancování vzniku zařízení pro využití BRO + BRKO. </div>
                  </div>
              </div>
          </div>

      </div>
      <div class="row row-equal item m-t-0">

        <div class="col-md-4">
            <div class="card">
                <div class="card-img-top card-img-top-250">
                    <div class="project-blank" style="background:#057705;height:92px;display:flex;align-items: center;"><i class="fas fa-forward" style="color:#fff;margin: 0 auto;font-size:20px"></i></div>
                </div>
                <div class="card-block p-t-2">
                    <div class="card-header"><h3>Hledat další projekty</h3></div>
                    <div class="card-text">Další projekty se nacházejí v archivu</div>
                </div>
            </div>
        </div>

      </div>
  </div>
  </section>

</div><!-- konec oblasti -->


<div class="projekty-oblast-6">
  <section class="container p-t-3" style="width:100%;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Oblast <span style="color: #057705;">dopravy</span></h1>
        </div>
    </div>
  </section>

  <section class="carousel6 slide" data-ride="carousel" id="postsCarousel">
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-4" >
              <a class="btn btn-outline-secondary prev6" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
              <a class="btn btn-outline-secondary next6" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
          </div>
      </div>
  </div>
  <div class="container p-t-0 m-t-2 carousel-inner">
      <div class="row row-equal item active m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/youngpeople.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Zelená mobilita</h3></div>
                      <div class="card-text">Využití vozidel s alternativním palivem pro potřeby obce. Účelné se jeví především:...</div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/textilebag.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Podpora paliva bioCNG </h3></div>
                      <div class="card-text"> Nákup automobilů, podpora výstavby bioCNG stanice. BioCNG je bioplyn různého původu... </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <img class="img-fluid" src="assets/images/projects/recycle.jpg" alt="Carousel 1">
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Sdílení obecních kol, elektrokol, koloběžek, vozidel</h3></div>
                      <div class="card-text">Nákup dopravních prostředků z rozpočtu obce a následné sdílení pro obyvatele obce, návštěvníky, turisty.</div>
                  </div>
              </div>
          </div>

      </div>
      <div class="row row-equal item m-t-0">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-img-top card-img-top-250">
                      <div class="project-blank" style="background:#057705;height:92px;display:flex;align-items: center;"><i class="fas fa-forward" style="color:#fff;margin: 0 auto;font-size:20px"></i></div>
                  </div>
                  <div class="card-block p-t-2">
                      <div class="card-header"><h3>Hledat další projekty</h3></div>
                      <div class="card-text">Další projekty se nacházejí v archivu</div>
                  </div>
              </div>
          </div>

      </div>
  </div>
  </section>

</div><!-- konec oblasti -->

</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>
