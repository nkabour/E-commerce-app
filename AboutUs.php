<?php  session_start(); ?>
<!DOCTYPE html>



<!-- Nora Al Babtain-->


<html>
<head>
  <title>Shampoo Factory - About us </title>
  <link rel="icon" href="IMG/shampoo logo.jpeg" />
  <link rel="stylesheet" type="text/css" href="CSS/AboutUs.css">
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

  <?php  if(isset($_SESSION["username"]) && isset($_POST["add"])){

         require "INCLUDES/Add_Rec_Mix.php";
         Add_Reccomnded_Mix($_POST["mid"]);
       }

       if(isset($_GET["logout"])){
         $_SESSION = array(); // Clear the variables.
        session_destroy(); // Destroy the session itself.
       }

       ?>

<script>
  $(function() {

    $('.scotch-panel').scotchPanel({
        containerSelector: '#super-container',
        distanceX: '30%'
    });
});</script>

  <meta name = "keywords" content = "website, shampoo, customize, shop, create, natural">
</head>


<body>
  <!-- Menu Bar-->
    <?php  include "INCLUDES//Header.php";?>   <!-- header file-->


<!--the main about us page starts here-->
  <!--header text-->
   <h1 class="H1_headingCookie">~ About Us ~</h1>

  <!--our story-->
    <p>&nbsp;</p>
    <p>&nbsp; </p>
    <div class="leftalign"><div class="whiteboxwithshadow">
      <img src="IMG/aboutus1.jpg" alt="our story picture" width="500" height="500"></div></div>
    <h1 class="H1_headingCookie">our story</h1>
    <p class="paragraphs"> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis. </p>

    <p>&nbsp; </p>
    <p>&nbsp; </p>
    <p>&nbsp; </p>
  <!--the creators-->
    <h1 class="H1_headingCookie" style="padding-top: 100px;" >The Creators of Shampoo Factory</h1>
     <p>&nbsp; </p>
      <!-- table to hold the images of the creators and with an overlay with text on top of them -->
     <table border="0" class="center1">
     <tr>
      <td><div class="creatorcont">
             <img src="IMG/admin1.jpg" alt="malak ahmad" class="creatorimg">
             <div class="overlay">
              <div class="creatorname">Malak ahmad</div>
            </div>
         </div>
      </td>
     <td><div class="creatorcont">
            <img src="IMG/admin2.jpg" alt="sara algahtani" class="creatorimg" >
            <div class="overlay">
             <div class="creatorname">Sara alGahtani</div>
            </div>
        </div>
    </td>
    </tr>
    </table>
  <!--our location-->
    <p>&nbsp; </p>
    <p>&nbsp; </p>

    <h2 class="H1_headingCookie">Our Locations</h2>
      <p>&nbsp; </p>
    <table class="center1">
       <tr>
        <td><div class="whiteboxwithshadow" style="width:648px;height:484px"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14296.735842490994!2d50.19876247871375!3d26.385243756171565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49ef85c961edaf%3A0x7b2db98f2941c78c!2z2KzYp9mF2LnYqSDYp9mE2KXZhdin2YUg2LnYqNiv2KfZhNix2K3ZhdmGINio2YYg2YHZiti12YQ!5e0!3m2!1sar!2ssa!4v1523806157832" width="648" height="484" frameborder="0" style="border:0" allowfullscreen></iframe></div></td>
       </tr>
    </table>




 <?php  include "INCLUDES//Footer.php"; ?> <!-- footer file-->

</body>
</html>
