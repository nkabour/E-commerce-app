<?php  session_start(); ?>
<!DOCTYPE html>


<!-- Raghad Bogery-->

<html>
  <head>
    <title>Shampoo Factory - Homepage</title>
    <link rel="icon" href="IMG/shampoo logo.jpeg" />
    <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css" />
    <link rel="stylesheet" type="text/css" href="CSS/indexStyle.css" />
    <link rel="stylesheet" type="text/css" href="CSS/popup.css" />
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css" />

    <?php  if(isset($_SESSION["username"]) && isset($_POST["add"])){

           require "INCLUDES/Add_Rec_Mix.php";
           Add_Reccomnded_Mix($_POST["mid"]);
         }

         if(isset($_GET["logout"])){
           $_SESSION = array(); // Clear the variables.
           session_destroy(); // Destroy the session itself.
         }

         ?>



    <meta name = "keywords" content = "website, shampoo, customize, shop">
  </head>

 <body> 
        <!-- Menu Bar-->
        <?php  include "INCLUDES//Header.php";?>   <!-- header file-->



      <!--the main body-->
      <div class="center">
          <!-- Main heading of page-->
        <h1 class="H1_headingCookie">Create Your Own Shampoo!</h1>
          <h4> Start Creating Your Own customized Shampoo  </h4>
          <a href="#" onClick="alert('Go to Create Shampoo page to start creating your own customized shampoo throught simple steps. Choose your shampoo ingredients, scent, color, and label it with your nickname!')">
            <img class="center" src="IMG/help.png"  alt="help" title="help?">
          </a>

        <img src="IMG/fullcolornames.png" class="imgMain" title="colorfull shampoos" alt="colorfull shampoos" />

        <?php
          if(isset($_SESSION["username"])){
              print('
                  <!--link to add mixture to my mixs -->
                  <a class="StartCreatingShampoo buttonLink start" href="createyourshampoo.php">Click here to Start!</a>

              </div>');}
          else{


              print('
                    <a class="StartCreatingShampoo buttonLink start" href="#popup2">Click here to Start!</a>
                  </div>

                      <!--error start cearting shampoo pop up-->
                      <div id="popup2" class="overlay">
                      <div class="popup">
                        <a class="closeError" href="#">&times;</a>

                          <div class="errorDiv"> <p> You Must Be Signed In To Create Your Shampoo
                              <a href="Signin.php">Sign In Now</a></p></div>
                      </div>
                      </div><!-- popup div-->');
          }
        ?>

        <!-- shampoo quality pictures: Cruelty Free, Envoirnment Friendly,  BPA Free, And Recylable -->
      <div class="center">
          <img src="IMG/logos.png" alt=' bpa free shampoo' class="logos" title="Cruelty and BPA free">
          <h4 class="bottomMargin"> Our Shampoos Are Cruelty Free, Envoirnment Friendly,  BPA Free, And Recylable.
      </div>


      <!-- Second Main heading of page-->
      <h1 class="H1_headingCookie"> Our Recommended Shampoo Mixtures </h1>
      <marquee><h4> Don't Forget To Check Our Shampoo Of The Week! </h4></marquee>
      <a href="#" onClick="alert('View shampoo mixtures (ingredients, scent, color, label) that were reccomended to your by our Admin! You can add these mixtures to your mixs by clicking the add button in the slider')">
        <img class="center" src="IMG/help.png"  alt="help" title="help?">
      </a>

      <?php  require 'INCLUDES/Mix_Table.php'; ?><!--php function-->
      <span class="center">
        <!--slider start here-->
          <div class="container">
            <div class="slideshow_wrapper">
              <div class="slideshow">

              <?php  mix_table(); ?> <!--function that fill slider table from database-->

              </div>
            </div>
          </div>
        </span>



       <?php  include "INCLUDES//Footer.php"; ?> <!-- footer file-->

 </body>
</html>
