<?php session_start(); ?>
<html>
<head>
  <head>
    <title>Shampoo Factory - Order Placed</title>
    <link rel="icon" href="IMG/shampoo logo.jpeg" />
    <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <meta name = "keywords" content = "website, shampoo, customize, shop">
    <link rel="stylesheet" type="text/css" href="CSS/ShoppingCart.css">
    <link rel="stylesheet" type="text/css" href="CSS/checkout.css">
  </head>
  <body>

</head>
<body>
<!-- Menu Bar-->
<?php include 'INCLUDES//Header.php';?> <!-- header file-->
</body>

<?php
require 'INCLUDES//CartAndCheckout.php';
  if (isset($_POST['total'])) {
    $username = $_SESSION['username'];
    $userid = $_SESSION['id'];
    $cartRows = getCartItemsFor($username);
    if (count($cartRows) > 0) {
      //create order history
      require 'INCLUDES//Connection.php';
      $tt = $_POST['total'];
      $date7 = date('Y-m-d H:i:s');
      $add = $_POST['addressss'];
      $sql = "INSERT INTO `orderhistory` (`OID`, `orderdate`, `shipdate`, `CID`, `state`, `tottal_price`,`address`) VALUES (NULL, CURRENT_TIMESTAMP, '2018-04-19', $userid, 'inPreperation', $tt, '$add')";
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
        $OID = mysqli_insert_id($mysqli);
        $pid;
        foreach ($cartRows as $row) {
          $pid = $row['P_ID'];
          $qq = $row['quantity'];
          $sql = "INSERT INTO `orderitem` (`order_item_ID`, `order_history_id`, `quantity`, `product_id`) VALUES (NULL, $OID, $qq, $pid)";
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
            $sql = "DELETE FROM `add_to_cart`  WHERE `P_ID` = $pid and `C_ID` = $userid";
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

          }
        }
        mysqli_close($mysqli);
      }

?>
<div class="center">
  <h1 class="H1_headingCookie">Our factory just started preparing your Shampoo!</h1>
</div>

<?php

}
}


 ?>

 <div class="clearSpace"></div>
 <div id="actionButtons">
 <a href="index.php" class="button">Back to Home</a>
</div>


<?php include 'INCLUDES//Footer.php'; ?> <!-- footer file-->

</html>
