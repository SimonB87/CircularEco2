<?php
include("includes/header.php");
?>

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
    echo "Posty: " . $user['num_posts'] . "<br>";
    echo "Lajky: " . $user['num_likes'];
    ?>
  </div>

</div>

<div class="col-md-8 col-xs-12 col-md-push-1 main_column column">
  <h2>Zaslané projekty CE</h2>
  <section class="form-post-new-project">

      <form
          class="post-project-form"
          method="POST"
          action="post_project_store.php"
          target="_blank">
        <!-- Id typového řešení  -->
        <input id="sollutionId" name="id" type="hidden" value="">
        <!-- Jméno autora projektu   -->
        <input id="project_author_name" name="author_name" type="hidden" value="">
        <!-- Email autora projektu   -->
        <input id="project_author_email" name="author_email" type="hidden" value="">

        <label for="project_title">Název projektu :</label><br>
        <input
            type="text"
            id="project_title"
            name="title"
            placeholder="Název vašeho projektu ..."
            autofocus
            required
        /><br>
        <!-- publication_statut : USED FOR READ PREVIOUS PROJECT  -->
<!--         <input type="text" disabled readonly> -->

        <!-- admin_decision : USED FOR READ PREVIOUS PROJECT -->
<!--         <input type="text" disabled readonly> -->

        <label for="project_description_text">Text popisu projektu :</label><br>
        <textarea id="project_description_text" name="description_text" rows="10" cols="40">
        </textarea><br>

        <label for="project_link_main">Hlavní webový odkaz na projekt :</label><br>
        <input
            type="url"
            id="project_link_main"
            name="link_main"
            value="https://www."
        /><br>

        <label for="project_link_alternative">Alternativní webový odkaz na projekt: </label><br>
        <input
            type="url"
            id="project_link_alternative"
            name="link_alternative"
            value="https://www."
        /><br>
        <!-- author_reaction: USED FOR READ PREVIOUS PROJECT -->
<!--         <label for="author_reaction">Reakce autora projektu :</label>
        <textarea id="author_reaction" name="author_reaction" rows="10" cols="40">
        </textarea> -->

        <input class="submit" type="submit" value="Zaslat projekt"/>
    </form>
  </section>

  <!-- <section class="history-posted-project">
  TO DO - a cestion, where user can see his posted projects
  </section> -->

</div> <!-- closing of the wrapper div, this div stars in the included header file-->

</body>
</html>