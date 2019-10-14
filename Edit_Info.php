<?php  session_start(); ?>

<!DOCTYPE html>

<!-- Nada Al Kabour-->

<html>
<head>
  <title>Shampoo Factory - My Profile</title>
  <link rel="icon" href="shampoo logo.jpg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link rel="stylesheet" type="text/css" href="CSS/edit_info.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <script src="JAVASCRIPT/check_info.js" type="text/javascript"></script>
  <meta name = "keywords" content = "website, shampoo, customize, shop">

</head>

<body> 

    <?php include "INCLUDES/Header.php";?>
    <div class="center">
    <h1 class="H1_headingCookie">My Profile</h1>
    </div>

  <?php

  require "INCLUDES/query.php";

  if(isset($_GET['logout'])){
    $_SESSION = array(); // Clear the variables.
    session_destroy(); // Destroy the session itself.
    header("Location:index.php");
  }


  require "INCLUDES/disp_edit_info_form.php";
  require "INCLUDES/update_profile.php";
?>
  <div class="form_box">
  <form id="edit_form" method="post" action="Edit_info.php">
    <input type="hidden" name="redirect" value="Homepage.html">
    <h4><img src="IMG/personal_info.png " class="Account" alt='personal_info'> Change My Personal Information</h4>
    <div class="personal_info">
     <table>

    <?php
    $query="select Email, Name from `account` inner join customer on
    customer.cu_userName=account.Username and customer.idCustomer=". $_SESSION['id'];
    $labels=array("Email"=>"email",
                  "Full Name"=>"text");
           disp_text($labels,$query,true);

     ?>

    </table>
        <p class="error" id="error1"></p>
      <?php update_accountinfo( $_SESSION['id']);?>
      </div>
    <h4><img src="IMG/password.png " class="Account" alt='change_pass'> Change My Password</h4>
      <div class="change_pass" >
        <table>
        <?php
            $query="";
             $labels=array("Old Password"=>"password",
                            "New Password"=>"password",
                            "Confirm Password"=>"password");
              disp_text($labels,$query,false); ?>
      </table>
      <p class="error" id="error2"></p>
      <?php update_pass( $_SESSION['id']); ?>
      </div>
      <h4><img src="IMG/contact_info.png " class="Account" alt='contact_info'> Change My Contact Information</h4>
      <div class="contact_info">
      <table>
      <?php $query="select Phone, Phone2 from `customer` where customer.idCustomer=". $_SESSION['id'];
            $labels=array("Phone Number 1"=>"tele",
                          "Phone Number 2"=>"tele");
             disp_text($labels,$query,true);

             ?>
      </table>
      <p class="error" id="error3"></p>
      <?php  update_phone( $_SESSION['id']); ?>
      </div>

      <h4> <img src="IMG/address_info.png " class="Account" alt='address_info'> Change My Address Information</h4>
      <div class="address_info">
        <table>
        <?php

        $query="select StreatAddress,zipcode,city from `customer` where customer.idCustomer=". $_SESSION['id'];
        $labels=array("Streat Address"=>"text",
                             "Zipcode"=>"tele",
                             "City"=>"text");
          disp_text($labels,$query,true);
          $query="select `Country` FROM `customer` where customer.idCustomer=". $_SESSION['id'];
          disp_contries($query);

          ?>

        </table>
          <p class="error" id="error4"></p>
          <?php update_Address( $_SESSION['id']); ?>
      </div>
      <div >
        <input class="btn_form" type="submit" name="update" value="Save Changes">
      </div>
    </form>
  </div>


  <?php include "INCLUDES/Footer.php";?>
  </body>
</html>
