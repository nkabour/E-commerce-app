

<!DOCTYPE html>


<!-- Raghad Bogery-->

<html>
<head>
  <title>Shampoo Factory - Sign In</title>
  <link rel="icon" href="IMG/shampoo logo.jpeg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css" />
  <link rel="stylesheet" type="text/css" href="CSS/popup.css" />
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="CSS/Signstyle.css" />

  <meta name = "keywords" content = "website, shampoo, customize, shop" />
</head>

<body> 
<?php include "INCLUDES//Header.php" ;?> <!-- header file-->

  <!-- Main heading of page-->
<h1 class="H1_headingCookie"> Sign In to Your Account </h1>

<!--Signin box-->
<div class="signDiv">
    <!-- pic sub box-->
  <div class="pic_container">

    <div class="thumbnail__logo">
      <svg class="pic__shape" width="25px" viewBox="0 0 634 479" ><g></g></svg>
    </div>

    <!-- text on pic-->
    <div class="pic__text">
      <h1>Welcome to Shampoo Factory</h1>
      <h2>Sign in to start creating your shampoo!</h2>
    </div>

    <!-- pic sub box overlay color box-->
    <div class="sign__overlay"></div>
  </div>


  <!-- signin form start here in sub box 2-->
  <div class="sign__form">
    <form action="" method="post">


      <?php
          require "INCLUDES//Form_fields.php"; //input generate function
          if(isset($_POST["submit"])){
              //input function(label, label for=, inout type, input name, placeholder )
              input("Username*:", "username", "text", "username", "your username ", $_POST["username"]);
              input("Password*:", "password", "password", "password", "********", "");
            }
          else {
              input("Username*:", "username", "text", "username", "your username ", "");
              input("Password*:", "password", "password", "password", "********", "");
          }

      ?>


      <div>
          <p><input class="btn_form center" type="submit" name="submit" value="Signin" /></p>
          <p>  <a class="link center" href="SignUp.php"> Create a New Account?</a><p>
      </div>


     <?php
          require "INCLUDES//Login.php";//login validate function
          if(isset($_POST["submit"]) and $_SERVER["REQUEST_METHOD"]=="POST")
          {
                if(isset($_SESSION["logged_in"]))
                {
                    header("Location: index.php");
                }
                  login($_POST["username"], $_POST["password"]);
          }

      ?>
    </form>
  </div>

</div>

<?php  include "INCLUDES//Footer.php"; ?> <!-- footer file-->

</body>
</html>
