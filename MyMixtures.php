<?php  session_start(); ?>
<!DOCTYPE html>

<!-- Nada Al Kabour-->

<html>

<head>
  <title>Shampoo Factory - My Mixtures</title>
  <link rel="icon" href="shampoo logo.jpg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link rel="stylesheet" type="text/css" href="CSS/MyMixturesstyle.css">
  <script type="text/javascript" src="JAVASCRIPT/Toggole.js"></script>
  <meta name="keywords" content="website, shampoo, customize, shop">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>

<body>
<?php include "INCLUDES/Header.php";?>
<div class="center">
<h1 class="H1_headingCookie">My Mixtures</h1>
</div>


<?php

if(isset($_GET['logout'])){
  $_SESSION = array(); // Clear the variables.
  session_destroy(); // Destroy the session itself.
  header("Location:index.php");
}


?>

<div class="big_box">
<!-- since forms cant be chiled for a table, tbody or tr -->

<div class="tableOfMixes">
<table>

  <?php

  require "INCLUDES/display_mixtures_with_form.php";
  ?>
</table>
</div>

  <form method="post" action="MyMixtures.php" id="delete_mix"></form>
  <div class="btns">
    <a href="createyourshampoo.php">
      <button class="btn" type="button" >Add A New Mixture</button>
    </a>
  </div>
</div>



<!--the page footer-->
<?php include "INCLUDES/Footer.php";?>
</body>
</html>
