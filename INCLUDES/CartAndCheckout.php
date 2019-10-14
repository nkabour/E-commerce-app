<?php

function updateQuantityinDB() {
  require 'INCLUDES//Connection.php';
  if( $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_name']) && $_POST['form_name'] === 'quantityChange') {
      $prodctIDToChangeQuantity = (int)$_POST['product_ID'];
      $Quantity = (int)$_POST['quantity'];
      $customer = (int)$_POST['customer_ID'];
      $sql;
      if (isset($_POST['add'])) {
        $Quantity = $Quantity + 1;
        $sql = "UPDATE `add_to_cart` SET `quantity` = $Quantity  WHERE `P_ID` = $prodctIDToChangeQuantity  and `C_ID` = $customer";
      }elseif (isset($_POST['subtract'])) {
        $Quantity = $Quantity - 1;
        $sql = "UPDATE `add_to_cart` SET `quantity` = $Quantity  WHERE `P_ID` = $prodctIDToChangeQuantity  and `C_ID` = $customer";
      } elseif (isset($_POST['delete'])) {
        $Quantity = 0;
        $sql = "DELETE FROM `add_to_cart`  WHERE `P_ID` = $prodctIDToChangeQuantity and `C_ID` = $customer";
      }
      if ($mysqli->connect_errno) {
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        exit;
      }
      if (!$result = $mysqli->query($sql)) {
          // Oh no! The query failed.
          echo "Sorry, the website is experiencing problems.";

          // Again, do not do this on a public site, but we'll show you how
          // to get the error information
          echo "Error: Our query failed to execute and here is why: \n";
          echo "Query: " . $sql . "\n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit;
      } else {
      }

    }

}
}



function getCartItemsFor($username) {
if (isset($_SESSION['id'])) {

  require 'INCLUDES//Connection.php';

        $cartRowsql = "SELECT * FROM `customer` JOIN `product` JOIN `add_to_cart` JOIN `mixtures`\n"

            . "ON customer.idCustomer = add_to_cart.C_ID and product.ProductID = add_to_cart.P_ID AND product.MixID = mixtures.MID\n"

            . "WHERE customer.cu_userName = '$username'";


        if (!$result = $mysqli->query($cartRowsql)) {
            // Oh no! The query failed.
            echo "Sorry, the website is experiencing problems.";

            // Again, do not do this on a public site, but we'll show you how
            // to get the error information
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        if ($result->num_rows === 0) {
        // Oh, no rows! Sometimes that's expected and okay, sometimes
        // it is not. You decide. In this case, maybe actor_id was too
        // large?
        }
        $cartRows = array();
        while ($ci = $result->fetch_assoc()) {
          $cartRows[] = $ci;
        }
        return $cartRows;

    }
}

function getIngredientsOfMixture($MixID) {
  require 'INCLUDES//Connection.php';

  $sql = "SELECT *\n" . "FROM `mixtures_contains_ingrediants`\n" . "WHERE MixID = '$MixID'";
      if (!$result = $mysqli->query($sql)) {
          // Oh no! The query failed.
          echo "Sorry, the website is experiencing problems.";

          // Again, do not do this on a public site, but we'll show you how
          // to get the error information
          echo "Error: Our query failed to execute and here is why: \n";
          echo "Query: " . $sql . "\n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit;
      }
      $ingredientsString = ' ';
      while ($ci = $result->fetch_assoc()) {
        $ingredientsString = $ingredientsString . $ci['IngrediantName'] . ', ';
      }
      return $ingredientsString;


}

function getDescriptionOfCartRow($cartRow) {
  require 'INCLUDES//Connection.php';

  $sql = "SELECT mixtures.Color, mixtures.ScentName, mixtures.MID\n"

  . "FROM `product` JOIN `mixtures` \n"

  . "ON product.MixID = mixtures.MID\n"

  . "WHERE product.ProductID =". $cartRow['ProductID'];

  if (!$result = $mysqli->query($sql)) {
      // Oh no! The query failed.
      echo "Sorry, the website is experiencing problems.";

      // Again, do not do this on a public site, but we'll show you how
      // to get the error information
      echo "Error: Our query failed to execute and here is why: \n";
      echo "Query: " . $sql . "\n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit;
  }
  if ($result->num_rows === 0) {
  // Oh, no rows! Sometimes that's expected and okay, sometimes
  // it is not. You decide. In this case, maybe actor_id was too
  // large?
  echo "We could not find a match for ID ". $cartRow['ProductID'] .", sorry about that. Please try again.";
  }
  $produtInfo = $result->fetch_assoc();
  $produtInfoString = $produtInfo['ScentName'] . ', ' . getIngredientsOfMixture($produtInfo['MID']) . $produtInfo['Color'];
  return $produtInfoString;
}
function displayAddressesForCustomer($username) {
  require 'INCLUDES//Connection.php';
$sql = "SELECT *  FROM `customer` WHERE customer.cu_userName = '$username'";

            if (!$result = $mysqli->query($sql)) {
            // Oh no! The query failed.
            echo "Sorry, the website is experiencing problems.";

            // Again, do not do this on a public site, but we'll show you how
            // to get the error information
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        if ($result->num_rows === 1) {

          $customerinfo = $result->fetch_assoc();
          $stadd = $customerinfo['StreatAddress'];
          $city = $customerinfo['City'];
          $zcode = $customerinfo['ZipCode'];
          $phone = $customerinfo['Phone'];
          $contry = $customerinfo['Country'];
          if ($city != "") {
            echo '<h3> <input type="radio" name="toaddress" id="defualtAddress" value="d" checked> Your Default Address</h3>';
            echo '<div class="anAddress"><p>'. $stadd. '<br>'. $city .','. $zcode .'<br>'. $phone .'<br>'. $contry.'<br></p></div>';
             echo '<h3><input type="radio" name="toaddress" id="newAddress" value="n"> Send to a new address</h3>';

          } else {
             echo '<h3><input type="radio" name="toaddress" id="newAddress" value="n" checked> Send to a new address</h3>';

          }

             echo'<div class="addAdress">
                    <input type="text" id = "first" name="first" placeholder="First Name">
                    <input type="text" id = "last" name="last" placeholder="Last Name">
                    <input type="text" id ="streetaddress" name="streetaddress" placeholder="Street Address">
                    <input type="text" id ="city" name="city" placeholder="City">
                    <input type="text" id="postalcode" name="postalcode" placeholder="Postal Code">
                    <input type="text" id="country" name="country" placeholder="Country">

                  <br> <br>

                  <p id="err"> </p>

                  </div>';


      } else {
        // Oh, no rows! Sometimes that's expected and okay, sometimes
        // it is not. You decide. In this case, maybe actor_id was too
        // large?
        echo "We could not find a match for ID $customerID , sorry about that. Please try again.";

      }
}

/*
<tr class="ItemRow">
  <?php
  displayCartElementInfoCell('Snowy Shampoo', 'White, Argan oil, Jasmine','small',19.00,'105');
  displayCartElementPQCell(19,1,'105');
   ?>
</tr>

<tr class="ItemRow">
  <?php
  displayCartElementInfoCell('Blue Sky Shampoo', 'Blue, Avocado, Almonds, Biscuits','small',21.00,'106');
  displayCartElementPQCell(21,2,'105')

   ?>
</tr>
*/

?>

<?php
  function cartElementRow($cartRow, &$subtotal,$stepper)
  {
    # code...
    # construct the element Description
    print("<tr class=\"ItemRow\">");
    ##TODO: another query to fetch the ingredients
    $des = getDescriptionOfCartRow($cartRow);
    displayCartElementInfoCell($cartRow['Label'],$des,$cartRow['size'],$cartRow['Price'], $cartRow['ProductID']);
    displayCartElementPQCell($cartRow['Price'], $cartRow['quantity'], $cartRow['ProductID'],$cartRow['C_ID'], $subtotal, $stepper);
    print("</tr>");

  }

  function displayCartElementInfoCell($elementName = 'Shampoo Name', $elementDescription = 'Shampoo Description', $elementSize = 'Meidum', $UnitPrice = 50, $ProductID)
  {
    # displaying the info cell element from pre processed info
    print("<td class=\"ItemInfo\">");
    print("<img src=\"IMG/large_conditioner.svg\">");
    print("<h2> " . $elementName . "</h2>");
    print("<h3 class='des'> " . $elementDescription . ", ". $elementSize ."</h3>");
    print("<p class=\"UnitPrice\">Unit Price: $" .  $UnitPrice . "</p>");
    print("</td>");

  }

  function displayCartElementPQCell($UnitPrice = 50, $Quantity = 1, $ProductID,$customerID, &$subtotal, $withStepper = false)
  {
    # code...
    $totalPrice = $UnitPrice * $Quantity;
    $subtotal += $totalPrice;
    $selfurl = htmlspecialchars($_SERVER["PHP_SELF"]);
    print("<td class=\"ItemQuantityANDPrice\">");
    Print("<form name = \"quantityChange\" method = \"POST\" action = \"". $selfurl."\">");
    print("<div class=\"pricing\">");
    print("<div class=\"stepper\">");
    if ($withStepper) {
      if ($Quantity < 2) {
        print("<button type=\"submit\" name=\"subtract\" class=\"subtract\" disabled>-</button>");
      } else {
        print("<button type=\"submit\" name=\"subtract\" class=\"subtract\" >-</button>");

      }
    }
    print("<span id = \"quantityOf\".$ProductID> $Quantity </span>");
    if ($withStepper) {
      print("<button type=\"submit\" name=\"add\" class=\"add\">+</button>");
    }
    print("</div>");
    if ($withStepper) {
      print("<div class=\"deleteItem\">");
      print("<button type=\"submit\" name=\"delete\"> delete </button>");
      print("</div>");

    }
    Print("<input type=\"hidden\" name=\"quantity\" value=" . $Quantity .">");
    Print("<input type=\"hidden\" name=\"product_ID\" value=" . $ProductID .">");
    Print("<input type=\"hidden\" name=\"customer_ID\" value=" . $customerID .">");
    Print("<input type=\"hidden\" name=\"form_name\" value=\"quantityChange\">");

    Print("</form>");
    Print("<div class=\"subt\">");
    Print('$'.$totalPrice);
    Print("</div>");
    Print("</div>");
    Print("</td>");

  }

?>
