<?php session_start(); ?>

<!DOCTYPE html>

<!-- Rawan Al Muhsain-->

<html>
<head>
  <title>Shampoo Factory - Review Page </title>
  <!--this is my css .. finish -->



 <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="CSS/popup.css">
 <link rel="stylesheet" type="text/css" href="CSS/reviewsStyle.css">

<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
<meta name = "keywords" content = "website, shampoo, customize, shop, create, natural">
</head>


<body> 
  <!-- Menu Bar-->
  <!-- header is in include  finish-->

<?php  include "INCLUDES//Header.php";?>




  <div class="center">
    <!-- Main heading of page-->

  <h1 class="H1_headingCookie"> Reviews</h1>
  <!--here start coding review in middle-->
<div>
<!--Here is rating using stars-->
<!--Here is end-->
</div>
<!--down-->
<br><br><br>
<div class="hori" class="pad">

<center><h2 class="txtColor">Shop With Confidence</h2>
<p class="txtColor">Every review submitted on this page is from a real Function of Beauty customer who has purchased a set. In the interest of transparency, we never change reviews or use incentives to influence these reviews. Here you can compare how people of different hair types and hair goals rate their experience with our shampoo and conditioners</p>
</center>
<br>
</div>



</div>
<!-- the form for the Review-->

<div class="hori">
<p>
<br><br>
<!--DropDown list-->


<!-- Button to trigger modal -->

<div>
    <?php
    if (isset($_SESSION['id'])) {
        print('<a href="#myModal" class="inputbtn3" data-toggle="modal">Click here to add your review</a>');

    }
?>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4 class="modal-title">review</h4>
        </div>
        <div class="modal-body">




<!--Rating a stras   I need to do it as loop try id -->

<!--End <option  value="hide">ORDERS</option>
    <option  value="1" rel="icon-temperature">Order1</option>
    <option  value="2">Order2</option>
    <option  value="3">Order3</option> -->
<?php
    $database = mysqli_connect("localhost","root","");
    if (!mysqli_select_db ($database,"Shampoo_Factory"))
      exit ("couldn't open the database</section></div></body></html>");

    $item1 = "Select OID FROM orderhistory where CID =\"".$_SESSION['id']."\"";
    if (! ($result= mysqli_query($database,$item1)))
    {
      print ("<p> Query couldn't be executed </p>");
      exit (mysqli_error()."</section></div></body></html>");
    }


    mysqli_close($database);


if(mysqli_num_rows($result)<1)
{
?>
    <center><h4 class="txtColor">You don't have any orders yet. </h4></center>
<?php }
else
{
?>
<div id="wrapper">
  <form action="Reviews.php" method="post">






  <center><h4 class="txtColor"> Which order you want to write a review about?



<?php
//$item1 = "SELECT orderhistory.OID From orderhistory";


echo "<select name='sub1'>";
while($row = mysqli_fetch_row($result))
  {
    foreach($row as $element => $value)
    echo "<option>" .$value ."</option>" ;
  }

echo "</select>" ;

?>

</h4></center>


<p>


   <center><input type="text" name="name" size="60%" placeholder="Write The Title :)" ></center>

</p>
    <p>


    <center><textarea placeholder="Write Your comment :)" rows="20" name="comment" value="comment" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" required></textarea></center>



  <!--Here is the Satr Code for Rating : -->
  <p class="clasificacion">

    <input id="radio1" type="radio" name="star1" value="5"><!--
      --><label for="radio1">&#9733;</label><!--

      --><input id="radio2" type="radio" name="star1" value="4"><!--
      --><label for="radio2">&#9733;</label><!--

      --><input id="radio3" type="radio" name="star1" value="3"><!--
      --><label for="radio3">&#9733;</label><!--

      --><input id="radio4" type="radio" name="star1" value="2"><!--
      --><label for="radio4">&#9733;</label><!--

      --><input id="radio5" type="radio" name="star1" value="1"><!--
      --><label for="radio5">&#9733;</label>



    </p>

<br><br>


  <!-- Satr Code for Rating End. -->


     <!-- <input type="submit" value="submit" name="submit" style="margin-left: 41.5%" /> -->
    <input type="submit" value="submit" name="submit" style="margin-left: 41.5%"/>
    </p>
  </form>
</div>



<?php
}
?>
<!--stars php code-->


<!--End stars php code-->




<div>

</div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


</div>





<div>

</div>

<!--end rating stars -->




 <br>

<!--text Area-->




<!--end text Area-->



<!--end drop down list-->

</p>

</div>



<?php



  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {




//1  ASMA'A  HEEEEERRRRREEEEEEEEE
$conn = mysqli_connect ('localhost', 'root', '','Shampoo_Factory');




if(!empty($_POST['star1'])){
  $rate= $_POST['star1'];
  }
  else
  {
    $rate=0;
  }

//$rate= $_POST['star1'];
$Comment = $_POST['comment'];
//$Title1 = $_POST['name'];
$submit= $_POST['submit'];
$cusID = $_SESSION['id'];
$title = $_POST['name'];


  if($Comment){
$sql = "INSERT INTO `Reviews` (`Review_ID`, `customerID`, `Title`, `Review_Body`, `Product_Rate`) VALUES (NULL, $cusID,'$title', '$Comment', '$rate')";

if (!mysqli_query($conn,$sql)) {
    echo mysqli_error($conn);
  } else {
    echo "your review has been inserted";
}}
  else
  {
    echo "Please fill the fields   ";
  }


mysqli_close($conn);


  }





?>





<?php
//require 'INCLUDES//query.php';

      //if user is not authorized to view stock

{

/*$Comment = $_POST['comment'];

$usern="501";


//$custID="Select customerID FROM Reviews JOIN customer on Reviews.customerID = customer.idCustomer where customer.cu_userName =  $_SESSION[‘id’] ";
$custID="Select customerID FROM Reviews JOIN customer on Reviews.customerID = customer.idCustomer where customer.cu_userName =  $usern ";


$sql = "INSERT INTO reviews(review_body) VALUES ($Comment) where customerID = $custID ";
//$res=$database->query($sql);

$result = return_query($sql);

*/


$ItemsQuery="Select account.Name, Reviews.Title, Reviews.review_body, Reviews.Product_Rate  FROM Reviews JOIN customer JOIN account on Reviews.customerID = customer.idCustomer and account.Username = customer.cu_userName";


       // $ItemsQuery="Select Review_ID, Title, review_body from Reviews";
        //I try to take the nme from user



        if ( !($database=mysqli_connect("localhost","root","")))
          exit ("couldn't connect to the server</section></div></body></html>");

        if (!mysqli_select_db ($database,"Shampoo_Factory"))
          exit ("couldn't open the database</section></div></body></html>");

        if (! ($result= mysqli_query ($database,$ItemsQuery)))
        {
          print ("<p> Query couldn't be executed </p>");
          exit (mysqli_error()."</section></div></body></html>");
        }

        mysqli_close($database);

        echo '<table align="center"> <caption><h3> Comments</h3> </caption>';

        echo '<table class="table table-striped"> ';

   echo' <thead>
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Comment</th>
        <th>Product Rate</th>


      </tr>
    </thead>';



        while ($row=mysqli_fetch_row($result))
        {
          print ("<tr>");

          foreach ($row as $key => $value)
          {
            print ("<td> $value</td>");
          }

          print ("</tr>");
        }

        }

          echo '</table> ';


      ?>




<!--End -->





<div class="hori"></div>


<!--footer copyright-->
 <?php  include "INCLUDES//Footer.php"; ?>

</body>
</html>
