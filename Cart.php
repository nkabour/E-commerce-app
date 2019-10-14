<?php
  session_start();
 ?>


<!DOCTYPE html>

<!-- Asma Yamani-->

<html>
<head>
  <title>Shampoo Factory - My Cart</title>
  <link rel="icon" href="shampoo logo.jpeg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <meta name = "keywords" content = "website, shampoo, customize, shop">
  <link rel="stylesheet" type="text/css" href="CSS/ShoppingCart.css">
  <?php

       if(isset($_GET["logout"])){
         $_SESSION = array(); // Clear the variables.
         session_destroy(); // Destroy the session itself.
       }

       //nora's part
       if(isset($_POST["label"])){
       //insert into 5 tables : mixtures, product , mixture ingredient,and creats add mix, and add to cart.
       $link = mysqli_connect('localhost','root','','shampoo_factory');
       //error counter
       $errorcount=0;

       // Check connection
       if (!$link) {
           die("Connection failed: " . mysqli_connect_error());
       }

       // inserting into mixtures table
        $q1="INSERT INTO mixtures(Color,Label,ScentName,Recommended) VALUES ('$_POST[color]', '$_POST[label]', '$_POST[smells]', '0')";
           //gettinng the last MixID from the mixtures table
        $lastid;
        if (mysqli_query($link, $q1)) {
        $lastid=mysqli_insert_id($link);
        echo"$lastid";
         //inserting into creats add mix table
          $q5="INSERT INTO `creates_add_mix`(`Customer_ID`, `Mix_ID`) VALUES ('".$_SESSION['id']."' ,'$lastid')";
           if (mysqli_query($link, $q5)) {}
               else{$errorcount*=1;}
        //getting the price based on the size of the shampoo bottole
        $p;
        if($_POST['size']=='Small')
          {$p=50;}
        elseif($_POST['size']=='Medium')
          {$p=100;}
        else
          {$p=150;}
          // inserting into products table
          $q2="INSERT INTO product(MixID,size,Price) VALUES ( '$lastid','$_POST[size]','$p')";
           //getting the last product id from the product table
             $pid;
            if ( mysqli_query($link, $q2)) {
                $pid=mysqli_insert_id($link);
           //    echo"$pid";
            //inserting into add to cart table
            $q4="INSERT INTO add_to_cart(C_ID,P_ID,quantity) VALUES ( '".$_SESSION['id']."','$pid','$_POST[quantity]')";
             if (mysqli_query($link, $q4)) {}
               else{$errorcount*=1;}
           }
            else {$errorcount*=1;}
          //inserting inti mixture ingredient
            $checkboxes;
            if( isset($_POST['ingredients']) )
                {  $checkboxes = $_POST['ingredients'];
            //        echo count($checkboxes); }
                    foreach($checkboxes as $selected)
                       {
                          $q3 = "INSERT INTO `mixtures_contains_ingrediants` (`MixID`, `IngrediantName`) VALUES ('$lastid', '$selected')";
                          if (mysqli_query($link, $q3)) {
                                //echo "color inserted";
                               } }

        }

        else{}

       //end of nora's part
       }

       // Close Connection
       mysqli_close($link);
     }

       ?>


</head>
<!-- Menu Bar-->
<?php include 'INCLUDES//Header.php';?> <!-- header file-->

<!--the main body-->
<?php require 'INCLUDES//CartAndCheckout.php';?>

<div class="center">
    <!-- Main heading of page-->
  <h1 class="H1_headingCookie"> My Shopping Cart</h1>
  <?php require 'INCLUDES//Connection.php';?>

  <?php
    $username =$_SESSION['username'];
    updateQuantityinDB();
    $cartRows = getCartItemsFor($username);
  ?>


<div class="clearSpace"></div>
<div class="ShoppingCartTable">
  <?php
    if (count($cartRows) === 0){
      Print('<p class="center"> Ooops! your cart is empty </p>');
    } else {
      Print('<table>');
      $subtotal = 0;
      foreach ($cartRows as $cartRow) {
        cartElementRow($cartRow, $subtotal,true);
      }
    print("
      <tr><td class=\"ItemInfo\" id=\"Subtotal\">
      <p >Subtotal</p></td>
      <td class=\"ItemQuantityANDPrice\">$". $subtotal ."</td>
      </tr></table>");
  }

  ?>

</div>
<div class="clearSpace"></div>
<div id="actionButtons">
<a href="index.php" class="button">Continue Shopping</a>
<?php
if (count($cartRows) === 0){
  Print('<a onclick="alert(\'nothing in cart!\');" class="button">Checkout</a>');

} else {
  Print('<a href="Checkout.php" class="button">Checkout</a>');

}
?>

</div>
<div class="clearSpace"></div>
    <?php
    mysqli_close($mysqli);
    ?>
</div>
<?php include 'INCLUDES//Footer.php'; ?> <!-- footer file-->

</body>
</html>
