<?php  session_start(); ?>
<!DOCTYPE html>

<!-- Nada Al Kabour-->


<html>
<head>
  <title>Shampoo Factory - My Order History</title>
  <link rel="icon" href="shampoo logo.jpg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link rel="stylesheet" type="text/css" href="CSS/orderhistorystyle.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <meta name = "keywords" content = "website, shampoo, customize, shop">
  <?php

  if(isset($_GET['logout'])){
    $_SESSION = array(); // Clear the variables.
    session_destroy(); // Destroy the session itself.
    header("Location::index.php");
  }

       ?>

</head>

<body> 
  <?php include "INCLUDES/Header.php";?>
  <div class="center">
      <h1 class="H1_headingCookie"> My Order History </h1>
  </div>


<?php   require "INCLUDES/display_orderhistory.php";  ?>

<div class="big_box">
  <div class="historytable">
    <table>

     <?php disp_tableContent( $_SESSION['id']); ?>

     <p>    <?php //disp_details($element); ?></p>
     </table>
</div>
</div>

  <?php include "INCLUDES/Footer.php";?>
</body>
</html>
