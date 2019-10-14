<?php
function Add_Reccomnded_Mix($MID){

  //database credentials
  define('DBHOST1','localhost');
  define('DBUSER1','root');
  define('DBPASS1','');
  define('DBNAME1','shampoo_factory');
  // Connect to database
  $con = new mysqli(DBHOST1,DBUSER1,DBPASS1,DBNAME1);
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);}


  //prepare query
  $stmt = $con->prepare("INSERT INTO Creates_Add_Mix (Customer_ID, Mix_ID) VALUES (? , ?)");
  $stmt->bind_param('ss', $_SESSION['id'], $MID);

  if($stmt->execute())  //To check if the row exists
  {
          echo "<script type='text/javascript'>alert('Mix was added succssesfully');</script>";


   }
   else {
          echo "<script type='text/javascript'>alert('The mixture is already added');</script>";

   }
   $con->close();
   $stmt->close();


}











?>
