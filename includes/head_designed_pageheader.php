

<div class="background">
  <div class="background-seeThrough">
  <div class="top_bar">
    <div class="logo">
      <a href="index.php"> <img class="websiteLogo" src="assets/images/logoobcevkruhu_small_bw.png" alt="obce v kruhu logo"> </a>
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

      <script>
        function showMobileMenu() {
          $(".websiteMobileMenu--Item").toggleClass("invisible");
        }
      </script>

        <ul id="websitePcMenu" class="websitePcMenu">

        <li>
          <a href="#" class="mainMenuItems mobileInvisible">
            <div class="mainMenuItemIcon"><i class="fas fa-user"></i></div>
            <div> <?php echo $user['first_name']; ?>  </div>
          </a>
        </li>
        

        <li> 
          <a href="index.php" class="mainMenuItems mobileInvisible">
            <div class="mainMenuItemIcon"><i class="fa fa-home fa-lg"></i></div>
            <div class="nav-icon-mobile">Novinky</div>
          </a>
        </li>

        <li class="dropdown">
          <a class="mainMenuItems mainMenuItems--largeScreen mobileInvisible">
              <div class="mainMenuItemIcon"><i class="fas fa-user-tie projectContent"></i></div>
              <div class="nav-icon-mobile projectContent">Typová řešení <i class="fas fa-angle-down"></i> </div>

              <div class='dropdown-content displayNone'> <!-- start of responsive drop down -->
                <a href="tableprojects.php" class="dropdown-content__item">
                  <div class="mainMenuItemIcon"><i class="fas fa-dove "></i></div>
                  <div class="">Tabulka typových řešení</div>
                </a>

            <?php
              $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email, userRole FROM users WHERE username='$userLoggedIn'");
              $row = mysqli_fetch_array($user_data_query);
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              $email = $row['email'];
              $userRole = $row['userRole'];

              if ($userRole === "super") {
                echo "<a href='manage.php' class='dropdown-content__item'>" .
                        "<div class='mainMenuItemIcon'><i class='fas fa-user-tie '></i></div>" .
                        "<div class=''>Administrace příkladů</div>" .
                      "</a>";
              } 
              echo "<a href='manageUserSubmissions.php' class='dropdown-content__item'>" .
                    "<div class='mainMenuItemIcon'><i class='far fa-edit '></i></div>" .
                    "<div class=''>Mé podané příklady</div>" .
                  "</a>";
              ?>
          </div><!-- end of responsive drop down -->
        </a>
      </li>

      <li>  
        <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')" class="mainMenuItems mobileInvisible"> 
          <div class="mainMenuItemIcon"><i class="fa fa-envelope fa-lg"></i></div>
          <div>Zprávy
            <?php
            if($num_notifications > 0){
                echo '<span class="notification_badge unread_notification" id="unread_notifications">' . $num_notifications .'</span> ';
            }
            ?>
          </div>        
        </a>
      </li>

      <li>   
        <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')" class="mainMenuItems mobileInvisible">
          <div class="mainMenuItemIcon"><i class="fas fa-eye"></i></div>
          <div>Upozornění
          <?php
          if($num_messages > 0){
              echo '<span class="notification_badge unread_message" id="unread_message">' . $num_messages .'</span> ';
          }
          ?>
          </div>
      </li> 

      <li>
        <a href="requests.php" class="mainMenuItems mobileInvisible"> 
          <div class="mainMenuItemIcon"><i class="fa fa-users fa-lg"></i></div>
          <div>Kontakty
          <?php
          if($num_requests > 0){
              echo '<span class="notification_badge unread_requests" id="unread_requests">' . $num_requests .'</span> ';
          }
          ?>        
          </div>
        </a>
      </li>

      <li class="dropdown">   
        <a href="settings.php" class="mainMenuItems mobileInvisible"> 
          <div class="mainMenuItemIcon"> <i class="fas fa-user-cog"></i> </div>
          <div>Další <i class="fas fa-angle-down"></i> </div>
        </a>
        <div class='dropdown-content displayNone'> <!-- start of responsive drop down -->

          <a href="settings.php" class="mainMenuItems mobileInvisible"> 
            <div class="mainMenuItemIcon"><i class="fa fa-cog fa-lg"></i></div>
            <div>Nastavení</div>
          </a>

          <a href="#" class="mainMenuItems mobileInvisible">
            <div class="mainMenuItemIcon"><i class="fas fa-question"></i></div>
            <div>Nápověda</div>
          </a>

          <a href="contact.php" class="mainMenuItems mobileInvisible"> 
            <div class="mainMenuItemIcon"><i class="far fa-comment"></i></div>
            <div>Správce</div>
          </a>

        </div>

      </li>

      <li>
        <a href="includes\handlers\logout.php" class="mainMenuItems mobileInvisible">
          <div class="mainMenuItemIcon"> <i class="fa fa-sign-out-alt fa-lg"></i></div>
          <div>Odejít</div>
        </a>
      </li>

    </ul>

    <a href="#" id="burgerIcon">
      <span class="burgerIcon--span"> <i class="fas fa-bars" onclick="showMobileMenu();"></i>
    </a>
    
    <ul id="websiteMobileMenu" class="">


      <li class="websiteMobileMenu--Item invisible">
        <a href="#"> 
          <span class="websiteMobileMenu--Icon"> <i class="fas fa-user"></i> </span> 
          <span class="websiteMobileMenu--Description"> <?php echo $user['first_name']; ?> </span>
        </a>
      </li>

      <li class="websiteMobileMenu--Item invisible">
          <a href="index.php"> 
            <span class="websiteMobileMenu--Icon"> <i class="fa fa-home fa-lg"></i> </span> 
            <span class="websiteMobileMenu--Description">Novinky</span>
          </a>
        </li> 

      <?php 
      if ($userRole === "super") {
        echo "<li class='websiteMobileMenu--Item invisible'>" .
                "<a href='manage.php'>"  .
                  "<span class='websiteMobileMenu--Icon'> <i class='fas fa-user-tie projectContent'></i> </span>"  .
                  "<span class='websiteMobileMenu--Description projectContent'>Administrace příkladů</span>" .
                "</a>" .
            "</li>"; 
      }
      echo "<li class='websiteMobileMenu--Item invisible'>" .
              "<a href='manageUserSubmissions.php'>"  .
                "<span class='websiteMobileMenu--Icon'> <i class='far fa-edit projectContent'></i> </span>"  .
                "<span class='websiteMobileMenu--Description projectContent'>Mé podané příklady</span>" .
              "</a>" .
          "</li> " ;
      ?>
    
      <li class="websiteMobileMenu--Item invisible">
          <a href="tableprojects.php"> 
            <span class="websiteMobileMenu--Icon"> <i class="fas fa-dove projectContent"></i> </span> 
            <span class="websiteMobileMenu--Description projectContent">Typová řešení</span>
          </a>
      </li>  
    
      <li class="websiteMobileMenu--Item invisible">
          <a  href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')"> 
            <span class="websiteMobileMenu--Icon"> <i class="fa fa-envelope fa-lg"></i> </span> 
            <span class="websiteMobileMenu--Description">Zprávy
            <?php
            if($num_notifications > 0){
                echo '<span class="notification_badge unread_notification" id="unread_notifications">' . $num_notifications .'</span> ';
            }
            ?>          
            </span>
          </a>
      </li>

      <li class="websiteMobileMenu--Item invisible">
          <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')"> 
            <span class="websiteMobileMenu--Icon"> <i class="fas fa-eye"></i> </span> 
            <span class="websiteMobileMenu--Description">Upozornění
            <?php
            if($num_messages > 0){
              echo '<span class="notification_badge unread_message" id="unread_message">' . $num_messages .'</span> ';
            }
            ?>
            
            </span>
          </a>
      </li>

      <li class="websiteMobileMenu--Item invisible">
          <a href="requests.php"> 
            <span class="websiteMobileMenu--Icon"> <i class="fa fa-users fa-lg"></i> </span> 
            <span class="websiteMobileMenu--Description"> Kontakty
            <?php
            if($num_requests > 0){
              echo '<span class="notification_badge unread_requests" id="unread_requests">' . $num_requests .'</span> ';
            }
            ?> 
            </span>
          </a>
      </li> 
        
      <li class="websiteMobileMenu--Item invisible">
          <a href="settings.php"> 
            <span class="websiteMobileMenu--Icon"> <i class="fa fa-cog fa-lg"></i> </span> 
            <span class="websiteMobileMenu--Description">Nastavení</span>
          </a>
      </li> 
    
      <li class="websiteMobileMenu--Item invisible">
          <a href="#"> 
            <span class="websiteMobileMenu--Icon"> <i class="fas fa-question"></i> </span> 
            <span class="websiteMobileMenu--Description">Nápověda</span>
          </a>
      </li> 
    
      <li class="websiteMobileMenu--Item invisible">
          <a href="contact.php"> 
            <span class="websiteMobileMenu--Icon"> <i class="far fa-comment"></i> </span> 
            <span class="websiteMobileMenu--Description">Správce</span>
          </a>
      </li> 
    
      <li class="websiteMobileMenu--Item invisible">
          <a href="includes\handlers\logout.php"> 
            <span class="websiteMobileMenu--Icon"> <i class="fa fa-sign-out-alt fa-lg"></i> </span> 
            <span class="websiteMobileMenu--Description">Odejít</span>
          </a>
      </li> 

    </ul>

    </nav>

    <div class="dropdown_data_window" style="height:0px; border:none;"></div>
      <input type="hidden" id="dropdown_data_type" value="">
    </div>

  <script>
  $(function(){
  
  var userLoggedIn = '<?php echo $userLoggedIn; ?>';
  var dropdownInProgress = false;

    $(".dropdown_data_window").scroll(function() {
      var bottomElement = $(".dropdown_data_window a").last();
    var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

        // isElementInViewport uses getBoundingClientRect(), which requires the HTML DOM object, not the jQuery object. The jQuery equivalent is using [0] as shown below.
        if (isElementInView(bottomElement[0]) && noMoreData == 'false') {
            loadPosts();
        }
    });

    function loadPosts() {
        if(dropdownInProgress) { //If it is already in the process of loading some posts, just return
      return;
    }
    
    dropdownInProgress = true;

    var page = $('.dropdown_data_window').find('.nextPageDropdownData').val() || 1; //If .nextPage couldn't be found, it must not be on the page yet (it must be the first time loading posts), so use the value '1'

    var pageName; //Holds name of page to send ajax request to
    var type = $('#dropdown_data_type').val();

    if(type == 'notification')
      pageName = "ajax_load_notifications.php";
    else if(type == 'message')
      pageName = "ajax_load_messages.php";

    $.ajax({
      url: "includes/handlers/" + pageName,
      type: "POST",
      data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
      cache:false,

      success: function(response) {

        $('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage 
        $('.dropdown_data_window').find('.noMoreDropdownData').remove();

        $('.dropdown_data_window').append(response);

        dropdownInProgress = false;
      }
    });
    }

    //Check if the element is in view
    function isElementInView (el) {
        var rect = el.getBoundingClientRect();

        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && //* or $(window).height()
            rect.right <= (window.innerWidth || document.documentElement.clientWidth) //* or $(window).width()
        );
    }
  });

  </script>

  <div class="row wrapper">
