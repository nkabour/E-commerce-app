
<?php

session_start();
?>
<!DOCTYPE html>
<!-- Yara Saeed Alhashim -->
<html>
<head>
  <meta charset = "utf-8">
  <title>Manage User </title>
  <meta name="keywords" content="Admin,user,dashboard,Q&A,Support">
  <link rel="stylesheet" type="text/css" href="CSS/admin2css.css">
  <link rel="stylesheet" type="text/css" href="CSS/Manage.css">
  <script type="text/javascript" src="admin.js"></script>

</head>
<body>
  <!--Data base connection  -->
      <?php



$query ="select OID, orderdate,  state, tottal_price FROM orderhistory ";



if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );



  if ( !( $result = mysqli_query($connection,$query) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }



  mysqli_close( $connection );
  ?>

  <!-- Navigations -->
  <section    class="navigation">

   <?php  include "INCLUDES/navi.php";?>
    <?php  include "INCLUDES/mainnav.php";?>

   <!--  Navigations Options -->


   <div class="options-wrapper">

     <div class="panel-option ">
      <a href="adminDashboard.php" id="Dashbored" class="function"><img class="icon-pic" src="IMG/dashbored.png"><p>Dashbored</p></a>
    </div>
  </div>

  <div class="options-wrapper">

    <div class="panel-option ">
      <a href="ManageProducts.php" id="manageproducts" class="function"><img class="icon-pic" src="IMG/manageproducts.png"><p>Manage Products</p></a>
    </div>
  </div>

  <div class="options-wrapper">

    <div class="panel-option active">
      <a href="ManageUserspage.php" id="manageusers" class="function"><img class="icon-pic" src="IMG/users.png"><p>Manage Users</p></a>

    </div>
  </div>

</section>

<!-- End Of Navigations -->




<!--  page content header -->
<section class="page-content">

<?php  include "INCLUDES/adminh.php";?>
  <!-- End Of page content header -->



  <!--  page content  -->
  <div class="content" >




    <ul class="tabs" role="tablist manage ">
      <li>
        <input type="radio" name="tabs" id="tab1" checked />
        <label for="tab1"
        role="tab"
        aria-selected="true"
        aria-controls="panel1"
        tabindex="0">Q&A</label>
        <div id="tab-content1"
        class="tab-content"
        role="tabpanel"
        aria-labelledby="description"
        aria-hidden="false">
        <p>


          <form action="mailto:yara.s.1996@hotmail.com" method="post" enctype="text/plain">
            <h3 >User Name:</h3>
            <input type="text" id="usrename" name="usrename" placeholder="Enter ID..">


            <h3>Answer:</h3>
            <textarea id="description" name="description" placeholder="Write description.." ></textarea>


            <input type="submit" value="Send reply">





          </form>



        </p>
      </div>
    </li>
















    <li>
      <input type="radio" name="tabs" id="tab2" />
      <label for="tab2"
      role="tab"
      aria-selected="false"
      aria-controls="panel2"
      tabindex="0">View Users:</label>
      <div id="tab-content2"
      class="tab-content"
      role="tabpanel"
      aria-labelledby="specification"
      aria-hidden="true">
      <p>

<form  method="post" action="">
 <div class="field-wrap">

         Enter UserName

          <input type="text"  placeholder="UserName"  name="user"  >
        </div>

 <input type="submit" value="Search" name="search">
 </form>




<?php


if (isset($_REQUEST['search'])) {



   $user_name = $_POST['user'] ;

$query2 ="select * FROM customer where cu_userName= \"". $user_name ."\"";



    if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );



  if ( !( $result2 = mysqli_query($connection,$query2) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }
  mysqli_close( $connection );
  ?>

   <table>


    <?php
    
     print("<th>ID</th>");
    print(" <th>User name </th>");


    print(" <th>Phone</th>");
    print(" <th>Phone2</th>");




    while ( $row = mysqli_fetch_array( $result2 ) )
    {
      print( "<tr>" );

        print( "<td>".$row['idCustomer']."</td>" );
        print( "<td>".$row['cu_userName']."</td>" );
        print( "<td>".$row['Phone']."</td>" );
        print( "<td>".$row['Phone2']."</td>" );
      print( "</tr>" );
    }
    }?>

</table>















</p>
</div>
</li>







<?php 
$state = "";
$OID="";


  if (isset($_GET['edit'])) {
    $ORDERID = $_GET['edit'];
  
   
     $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");


    $q1="select OID, orderdate,  state FROM orderhistory where OID='".$ORDERID."'";
    
     if ( !( $result3 = mysqli_query($connection, $q1) ) )
  {
    print( "<p>Could not execute query! </p>" );
   
    die( mysqli_error($connection) . "</body></html>" );
  }



    if (mysqli_num_rows($result3) == 1 ) {
      $n = mysqli_fetch_array($result3);
      $state = $n['state'];
      $OID=$n['OID'];
     
    }
  }




if (isset($_POST['update'])) {
  $OID = $_POST['name'];
  $state = $_POST['state'];
  




$qupdate="update orderhistory set state='".$state."' where OID='".$OID."'";


     $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");
  
     if ( !( $result4 = mysqli_query($connection, $qupdate) ) )
  {
    print( "<p>Could not execute query! </p>" );
   
    die( mysqli_error($connection) . "</body></html>" );
  }

}




if (isset($_GET['del'])) {
  $OID = $_GET['del'];

 $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");


    $q3="delete FROM orderhistoryr WHERE OID='".$OID."'";
    
     if ( !( $result5 = mysqli_query($connection, $q3) ) )
  {
    print( "<p>Could not execute query! </p>" );
    echo $nameid;
    die( mysqli_error($connection) . "</body></html>" );
  }


 
}

?>

 <!-- orders -->
<li>
  <input type="radio" name="tabs" id="tab3" />
  <label for="tab3"
  role="tab"
  aria-selected="false"
  aria-controls="panel3"
  tabindex="0">Orders: </label>
  <div id="tab-content3"
  class="tab-content"
  role="tabpanel"
  aria-labelledby="specification"
  aria-hidden="true">
  <p>

 <?php

$query ="select OID, orderdate,state FROM orderhistory ";


if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" ); 
  if ( !( $result = mysqli_query($connection,$query) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }

  
  mysqli_close( $connection );




  ?>



<table>
<thead>
    <tr>
      <th>OrderID</th>
      <th>Order Date</th>
      <th>State</th>
      
      <th colspan="2">Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($result)) { ?>
    <tr>
      <td><?php echo $row['OID']; ?></td>
      <td><?php echo $row['orderdate']; ?></td>

        <td><?php echo $row['state']; ?></td>
      <td>
        <a href="ManageUserspage.php?edit=<?php echo $row['OID']; ?>"  >Edit</a>
      </td>
      <td>
        <a href="ManageUsrespage.php?del=<?php echo $row['OID']; ?>" >Delete</a>
      </td>
    </tr>
  <?php } ?>
    

    

  </table>
<form method="post" action="ManageUserspage.php" >
 <section class="input">


                 <input type="hidden" name="name" value="<?php echo $OID; ?>">
            
            <h3>Order State:</h3>
            <input type="text" id="state" name="state" placeholder="Enter state.." value="<?php  echo $state; ?>"  >
            <h3>Order number:</h3>
            <input type="text" readonly id="id" name="id" placeholder="Enter state.." value="<?php  echo $OID; ?>"  >
        

            
             <br>


  <input  type="submit" name="update" id="update" value="update" >

</form>
           


          
  <br>
    </p>
  </div>
</li>




</section>


</body>
</html>
