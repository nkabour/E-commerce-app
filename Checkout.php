<?php
  session_start();
 ?>
<!DOCTYPE html>


<!-- Asma Yamani-->

<html>
<head>
  <title>Shampoo Factory - Checkout</title>
  <link rel="icon" href="IMG/shampoo logo.jpeg" />
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <meta name = "keywords" content = "website, shampoo, customize, shop">
  <link rel="stylesheet" type="text/css" href="CSS/ShoppingCart.css">
  <link rel="stylesheet" type="text/css" href="CSS/checkout.css">
  <script>
            var first;
            var last;
            var streetaddress;
            var city;
            var postalcode;
            var country;
            var errormsg;
            function init()
            {
                first = document.getElementById("first");
                last = document.getElementById("last");
                streetaddress = document.getElementById("streetaddress");
                city = document.getElementById("city");
                postalcode = document.getElementById("postalcode");
                country = document.getElementById("country");
                err = document.getElementById("err");
                //event change
                var myForm = document.getElementById("myForm");
                myForm.onsubmit = validateAndSetAddress;
            }

            function validateAndSetAddress()
            {
              if (document.getElementById("newAddress").checked) {
              var errString = "";
              if(first.value == "") {
                errString += "Please enter the receiver's first name. <br>" ;
              }
              if(last.value == "") {
                errString += "Please enter the receiver's last name. <br>";

              }
              if(streetaddress.value == "") {
                errString += "Please enter the receiver's street address. <br>";

              }
              if(city.value == "") {
                errString += "Please enter the receiver's city. <br>";

              }
              if(postalcode.value == "") {
                errString += "Please enter the receiver's postal code. <br>";

              } else if (isNaN(postalcode.value)) {
                errString += "The postal code should be a number. <br>";

              } else if  (postalcode.value.length !== 5) {
                errString += "The postal code should contain exactly 5 digits. <br>";

              }
              if(country.value == "") {
                errString += "Please enter the receiver's country. <br>";

              }
            var inputAddress = document.getElementById('addressss');
            inputAddress.value = first.value + ' ' + last.value + ' ' + streetaddress.value + ' ' + city.value + ' ' + postalcode.value + ' ' + country.value;

              if (errString.length > 0) {
                err.innerHTML = errString;
                err.style.color = 'red';
                return false;
              }

            }
          
            }
            window.addEventListener('load', init, false);
        </script>

</head>
<body>
<!-- Menu Bar-->
<?php include 'INCLUDES//Header.php';?> <!-- header file-->

<!--the main body-->
<div class="center">
    <!-- Main heading of page-->
<h1 class="H1_headingCookie">Checkout</h1>
<div class="clearSpace"></div>
<?php require 'INCLUDES//CartAndCheckout.php';?>

<?php
  $username = $_SESSION['username'];
  updateQuantityinDB();
  $cartRows = getCartItemsFor($username);
  if (count($cartRows) === 0) {
    header('Location:index.php');
  }

  $subtotal = 0;
?>

<div class="ShoppingCartTable">
  <h3>Review your Order: </h3>
  <table>
    <?php
    if (count($cartRows) === 0) {
        echo "Oh! don't tell me you didn't order anthing";
    } else {
      foreach ($cartRows as $value) {
        cartElementRow($value, $subtotal,false);
      }

    }
     ?>
    <tr class="sums">
      <td class="ItemInfo" id="Subtotal">
        <p > Subtotal</p>
      </td>
      <td class="ItemQuantityANDPrice">
        <?php
        echo '$'.$subtotal;

         ?>

      </td>

    </tr>
    <tr class="sums">
      <td class="ItemInfo" id="Subtotal">
        <p > Shipping</p>
      </td>
      <td class="ItemQuantityANDPrice">
        $0.00
      </td>

    </tr>
    <tr class="sums">
      <td class="ItemInfo" id="Subtotal">
        <p > Tax (%0.05)</p>
      </td>
      <td class="ItemQuantityANDPrice">
        <?php
          $tax = $subtotal * 0.05;
          echo '$'.$tax;
        ?>
      </td>

    </tr>
    <tr class="sums" id = "total">
      <td class="ItemInfo" id="Subtotal">
        <h3 > Total </h3>
      </td>
      <td class="ItemQuantityANDPrice">
        <?php
          $tt = $subtotal + $tax;
          echo '$'.$tt;
        ?>
      </td>

    </tr>

  </table>
</div>

<div class="address">
  <form name="addressChoose">
<?php  displayAddressesForCustomer($username) ?>


</form>
</div>


</div>
<div class="clearSpace"></div>
<div id="actionButtons">
<a href="Cart.php" class="button">Edit Order</a>
<form id="myForm" class = "place" method="POST" action="OrderPlaced.php" name="place_order">
<input id="addressss" name="addressss" type="hidden" value="default">
<input id="actionButton" type="submit" value="Place your Order" name = "place" >
<input type="hidden" name="total" value="<?php echo $tt; ?>">
</form>
</div>
<div class="clearSpace"></div>



<?php include 'INCLUDES//Footer.php'; ?> <!-- footer file-->

</body>
</html>
