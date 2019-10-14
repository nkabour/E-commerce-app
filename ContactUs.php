<?php session_start(); ?>
<!DOCTYPE html>

<!-- Rawan Al Muhsain-->

<html>
<head>
  <title>Contact Us</title>
  <link rel="icon" href="IMG/shampoo logo.jpeg" />
  <link rel="stylesheet" type="text/css" href="CSS/contactStyle.css">
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

  <meta name = "keywords" content = "website, shampoo, customize, shop">
</head>

<body> 
  <!-- Menu Bar-->
<?php  include "INCLUDES//Header.php";?> 
<!--the main body-->

    <!-- Main heading of page-->
  <h1 class="H1_headingCookie"> Contact us</h1>

<!--here is my code-->

<div class="hor">

</div>


<!--info plcae-->
<br>
<div class="hori" class="pad">

<center>
<p class="txtColor">We'd love to hear from you if you have any questions or if you'd just like to say hello!
</p>
</center>
<br>
</div>



<form action="c.php" method="POST" class="center"> <div class="form center">
       <center>





<h4 class="txtc"> Subject : <select name="sub" id="mounth" required>


    <option  value="1" rel="icon-temperature">Order Placement</option>
    <option  value="2">Shipment Related</option>
    <option  value="4">Payment Related</option>
    <option  value="5">Return Defective or Damaged Items</option>
    <option  value="6">Other</option>
</select>



</h4>




   <div class="form">
    <input class="input-area" name="name" type="text" placeholder="Name" required>
    <input class="input-area" name="Email" type="text" placeholder="e-mail-address." required>

    <textarea class="input-area" name="message" type="text" placeholder="Message" rows="4" cols="" required></textarea>




</div>

    <input class="submit-button" type="submit" name="submit" value="send">

  </div>

  </center>



<div class="logo-container">

</div></form>







<br><br>


<div class="hor"></div>






<!--footer copyright-->
<?php  include "INCLUDES//Footer.php"; ?> <!-- footer file-->

</body>
</html>
