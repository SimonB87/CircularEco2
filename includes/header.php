<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Notification.php");

 /*if the user is loggen in, make the username variable equal to username. If user is not logged in, send him back to register page.*/
if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

?>

<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Vítejte na webu Circularních projektů</title>

  <!-- for carousel -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


  <link rel="stylesheet" type="text/css" href="assets/css/carousel-projects.css">

  <!-- <script src="assets/js/carousel-projects.js"></script> -->

  <!-- jQuery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


  <!-- Bootstrap 3.3.2 - https://getbootstrap.com/docs/3.3/getting-started/ -->
  <script src="assets/js/bootstrap.js"></script>
  <link rel="stylesheet"  type="text/css" href="assets/css/bootstrap.css">

  <script src="assets/js/bootbox.js"></script>

  <!-- my JS file -->
  <script src="assets/js/demo.js"></script>
  <!-- my carousel JS file -->
  <script src="assets/js/carousel.js"></script>

  <!-- J Crop Files-->
  <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />


  <!-- Fontawesome link -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>


  <!-- my style sheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/projectinfo.css">
  <link rel="stylesheet" type="text/css" href="assets/css/projectdashboard.css">
  
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/tabulka.css"> -->




  <!------ Include the above in your HEAD tag ---------->



</head>
<body>

<div class="top_bar">
  <div class="logo">
    <img class="" src="assets/images/circlogo.png" alt="" width="25" height="25">
    <a href="index.php">Circularní Projekty</a>
  </div>

  <div class="search">
    <form action="search.php" method="GET" name="search_form">
      <input type="text" onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn; ?>')" name="q" placeholder="Hledejte..." autocomplete="off" id="search_text_input">
        <!-- this.value is the value of whatever is being typed. -->
        <div class="button_holder">
            <img src="assets/images/searchicon.png" alt="">
        </div>
    </form>

    <div class="search_results"><!-- this was missing -->
    </div>
    <div class="search_results_footer_empty"><!-- this was there -->
    </div>
  </div>

  <nav>
    <?php
      //Unread Messages.
      $messages = new Message($con, $userLoggedIn);
      $num_messages = $messages->getUnreadNumber();
      //Unread Notifications.
      $notifications = new Notification($con, $userLoggedIn);
      $num_notifications = $notifications->getUnreadNumber();
      //Unread Requests.
      $user_obj = new User($con, $userLoggedIn);
      $num_requests = $user_obj->getNumberOfFriendRequest();
     ?>

    <a href="#" class="mainMenuItems mobileInvisible nav-menu-mobile"><i id="nav-menu-mobile-icon" class="fa fa-bars fa-lg nav-menu-mobile-hamburger"></i></a>

    <a href="#" class="mainMenuItems mobileInvisible">
      <span class="nav-icon-mobile"></span>
      <?php
        echo $user['first_name'];
      ?>
    </a>
    <a href="index.php" class="mainMenuItems mobileInvisible"><span class="nav-icon-mobile"><i class="fa fa-home fa-lg"></i></span><span class="nav-repsonsive-description">Domů</span></a>
    <a href="project.php" class="mainMenuItems mobileInvisible"><span class="nav-icon-mobile"><i class='fas fa-frog'></i></span><span class="nav-repsonsive-description">Projekty</span></a>
    <!--
    <a href="messages.php" class="mainMenuItems mobileInvisible"><i class="far fa-comment-alt"></i></i></a>
    -->
    <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')" class="mainMenuItems mobileInvisible"> 
      <span class="nav-icon-mobile"><i class="fa fa-envelope fa-lg"></i></span> <span class="nav-repsonsive-description">Zprávy</span>
        <?php
        if($num_notifications > 0){
            echo '<span class="notification_badge unread_notification" id="unread_notifications">' . $num_notifications .'</span> ';
        }
        ?>
        </a>
    <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')"  class="mainMenuItems mobileInvisible">
      <span class="nav-icon-mobile"><i class="fas fa-eye"></i></span><span class="nav-repsonsive-description">Upozornění</span> </a>
        <?php
        if($num_messages > 0){
            echo '<span class="notification_badge unread_message" id="unread_message">' . $num_messages .'</span> ';
        }
        ?>


    <a href="requests.php" class="mainMenuItems mobileInvisible"> <span class="nav-icon-mobile"><i class="fa fa-users fa-lg"> </i></span> <span class="nav-repsonsive-description">Kontakty</span></a>
        <?php
        if($num_requests > 0){
            echo '<span class="notification_badge unread_requests" id="unread_requests">' . $num_requests .'</span> ';
        }
        ?>
    <!--<a href="upload.php" class="mainMenuItems mobileInvisible"> <i class="fa fa-cog fa-lg"></i></a> -->
    <a href="settings.php" class="mainMenuItems mobileInvisible"> <span class="nav-icon-mobile"><i class="fa fa-cog fa-lg"></i></span><span class="nav-repsonsive-description">Nastavení</span></a>
    <a href="#" class="mainMenuItems mobileInvisible"><span class="nav-icon-mobile"><i class="fas fa-question"></i></span><span class="nav-repsonsive-description">Nápověda</span></a><!-- link to user-manual -->
    <a href="contact.php" class="mainMenuItems mobileInvisible"> <span class="nav-icon-mobile"><i class="far fa-comment"></i></span><span class="nav-repsonsive-description">Správce</span></a><!-- link to user-manual -->
    <a href="includes\handlers\logout.php" class="mainMenuItems mobileInvisible"><span class="nav-icon-mobile"><i class="fa fa-sign-out-alt fa-lg"></i></span><span class="nav-repsonsive-description">Odejít</span></a>

  </nav>

  <div class="dropdown_data_window" style="height:0px; border:none;"></div>
    <input type="hidden" id="dropdown_data_type" value="">
  </div>

</div>

<script>
var userLoggedIn = '<?php echo $userLoggedIn; ?>';

$(document).ready(function() {

  $('.dropdown_data_window').scroll(function() {
    var inner_height = $('.dropdown_data_window').innerHeight(); //Div containing data
    var scroll_top = $('.dropdown_data_window').scrollTop();
    var page = $('.dropdown_data_window').find('.nextPageDropdownData').val();
    var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

    if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {

      var pageName; //Holds name of page to send ajax request to
      var type = $('#dropdown_data_type').val();


      if(type == 'notification')
        pageName = "ajax_load_notifications.php";
      else if(type = 'message')
        pageName = "ajax_load_messages.php"


      var ajaxReq = $.ajax({
        url: "includes/handlers/" + pageName,
        type: "POST",
        data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
        cache:false,

        success: function(response) {
          $('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage
          $('.dropdown_data_window').find('.noMoreDropdownData').remove(); //Removes current .nextpage


          $('.dropdown_data_window').append(response);
        }
      });

    } //End if

    return false;

  }); //End (window).scroll(function())


});

</script>

<div class="row wrapper">
