<!-- Menu Bar By Raghad-->
<header>
<div class="center">

     <img src="IMG/shampoo logo.jpeg " class="baner" alt='shampoo factory' align="top" />

     <p class="center">
       <?php
       if(isset($_SESSION['username'])){
         $username=ucfirst($_SESSION['username']);//capitilize first letter
         print("Hello, ".$username); //echo $_SERVER['PHP_SELF']; class="a_current"
       }
       else
         print("Hello");
       ?>
        <a href ="index.php"> Homepage </a>
        <?php if(isset($_SESSION['username']))
                print('<a href ="createyourshampoo.php"> Create Your Shampoo </a>');
              else
                print('<a href ="createyourshampoo.php" class="disabled" title="Sign-in to access this page" onclick="return false"> Create Your Shampoo </a>'); ?>
        <a href ="Reviews.php"> Reviews </a>
        <a href ="ContactUs.php"> Contact Us</a>
        <a href ="AboutUs.php"> About Us</a>
        <span class="dropdown"> <!-- drop down menu-->
          <button class="dropbtn"> <img src="IMG/menu.png " class="menu" alt='shampoo factory' /></button>
        <?php

          if(isset($_SESSION['username'])){
              print('
                  <span class="dropdown-content">
                  <a href="Edit_info.php"><img src="IMG/edit_info.png "  alt="edit_info" /> My Profile </a>
                  <a href="MyMixtures.php"><img src="IMG/my mixtures.png "  alt="my mixtures" /> My Mixtures</a>
                  <a href="OrderHistory.php"> <img src="IMG/order history.png " alt="order history" /> My Order History</a>
                  <a href="Cart.php"> <img src="IMG/my cart.png "  alt="my cart" /> My Cart</a>
                  <a href="index.php?logout=0"> <img src="IMG/logout.png "  alt="log off" /> Sign Out</a>
                  </span>');}
          else{

              print('
                  <span class="dropdown-content">
                    <a href="Signin.php"><img src="IMG/login.png " alt="sign in" /> Sign In</a>
                    <a href="SignUp.php"><img src="IMG/sign up.png " alt="my mixtures" /> Sign Up</a>
                  </span>');}
        ?>
        </span>
      </p>
    </div>
  <hr>
</header>
