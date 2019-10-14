

<!DOCTYPE html>


<!-- Raghad Bogery-->

<html>
<head>
  <title>Shampoo Factory - Sign Up</title>
  <link rel="icon" href="IMG/shampoo logo.jpeg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css" />
  <link rel="stylesheet" type="text/css" href="CSS/Signstyle.css" />
  <script type="text/javascript" src="JAVASCRIPT/signupValidate.js"></script>

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css" />

  <meta name = "keywords" content = "website, shampoo, customize, shop" />
</head>

<body> 
<?php  include "INCLUDES//Header.php";?> <!-- header file-->

  <!-- Main heading of page-->
<h1 class="H1_headingCookie"> Join Us </h1>
<h4 id="info"><h4>

  <!--Signup box-->
<div class="signDiv">
    <!-- pic sub box-->
  <div class="pic_container sign__thumbnail">

    <div class="thumbnail__logo">
      <svg class="pic__shape"> </svg>
    </div>
    <!-- text on pic-->
    <div class="pic__text">
      <h1>Welcome to Shampoo Factory</h1>
      <h2>Are you ready to join our family?</h2>
    </div>

    <!-- pic sub box overlay color box-->
    <div class="sign__overlay"></div>
  </div>


  <!-- sign up form start here in sub box 2-->
  <div class="sign__form">
    <form action="" method="post" id="myForm" >

        <?php   require "INCLUDES//Form_fields.php";//input generate function
            if(isset($_POST["submit"])){
            //input function(label, label for=, input type, input name, placeholder )
            input("Fullname*:", "Full Name", "text", "fullname", "First & family name", $_POST["fullname"]);
            input("Username*:", "username", "text", "username", "your username", $_POST["username"]);
            input("Email*:", "email", "emial", "email", "your_email@----.com", $_POST["email"]);
            input("Passwrod*:", "password", "password", "password", "*********", "");
            input("Repeat Password*:", "passwordRepeat", "password", "passwordRepeat", "*********", "");
          }
          else{
            //input function(label, label for=, input type, input name, placeholder )
            input("Fullname*:", "Full Name", "text", "fullname", "First & family name", "");
            input("Username*:", "username", "text", "username", "your username", "");
            input("Email*:", "email", "emial", "email", "your_email@----.com", "");
            input("Passwrod*:", "password", "password", "password", "*********", "");
            input("Repeat Password*:", "passwordRepeat", "password", "passwordRepeat", "*********", "");
          }

        ?>



      <div>
          <p><input class="btn_form center" type="submit" name="submit" value="SignUp" id="submit"  /></p>
          <p>  <a class="link center" href="Signin.php">Already a Member?</a><p>
      </div>
    </form>
  </div>


              <?php   require "INCLUDES//Signup.php";  //signup validate functions
                  if( $_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"]) ){
                    validate($_POST["password"], $_POST["passwordRepeat"], $_POST["username"], $_POST["fullname"], $_POST["email"]);
                  }

              ?>

</div>

<?php  include "INCLUDES//Footer.php"; ?> <!-- footer file-->

</body>
</html>
