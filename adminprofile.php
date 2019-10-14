
<?php session_start(); ?>
<!DOCTYPE html>
<!-- Yara Saeed Alhashim -->
<html>
<head>
  <meta charset = "utf-8">
  <title>My Profile</title>
  <meta name="keywords" content="Admin,dashboard,Q&A,Support">
  <link rel="stylesheet" type="text/css" href="CSS/admin2css.css">
  <link rel="stylesheet" type="text/css" href="CSS/Manage.css">
  <script type="text/javascript" src="JAVASCRIPT/admin.js"></script>
  
</head>
<body>
  <!-- Navigations -->
  <section    class="navigation">

    <?php  include "INCLUDES/navi.php";?>

    <!-- Main Navigations -->

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

    <div class="panel-option ">
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




<?php




    $query="SELECT Name FROM account WHERE Username='".$_SESSION['username']."'";
    $query2="SELECT Email FROM account WHERE Username='".$_SESSION['username']."'";
    $query3="SELECT PhoneNumber FROM  Admin WHERE ad_userName='".$_SESSION['username']."'";
     $query4="SELECT ad_userName FROM  Admin WHERE ad_userName='".$_SESSION['username']."'";

if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );



  if ( !( $result = mysqli_query($connection,$query) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }



  if ( !( $result2 = mysqli_query($connection,$query2) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }
    if ( !( $result3 = mysqli_query($connection,$query3) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }
if ( !( $result4 = mysqli_query($connection,$query4) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }
  mysqli_close( $connection );


 include "INCLUDES/editadmin.php";
  ?>



    <div class="form2 profile">



      <img class="profile-pic profile" src="IMG/adminpic.jpg">


      <h1>My Profile</h1>

      <form method="post" action="adminprofile.php" >

        <div class="top-row profile">

          <div class="field-wrap">

            First Name
            <?php
      while($row=mysqli_fetch_assoc($result))
    {
      foreach ( $row as $value )

       echo '<input type="text" name="FN" value='.$value.'><br/>';
    }
      ?>

          </div>



        <div class="field-wrap">

          UserName

          <?php
      while($row=mysqli_fetch_assoc($result4))
    {
      foreach ( $row as $value )

       echo '<input type="text"  value='.$value.' readonly ><br/>';
    }
      ?>
        </div>
        </div>




        <div class="field-wrap">

          Email Address

      <?php
      while($row=mysqli_fetch_assoc($result2))
    {
      foreach ( $row as $value )

       echo '<input type="Email" name="email" value='.$value.'><br/>';
    }
      ?>

       <?php update_accountinfo( $_SESSION['id']);?>

          Phone Number
           <?php
      while($row=mysqli_fetch_assoc($result3))
    {
      foreach ( $row as $value )

       echo '<input type="Phone" name="phone" value='.$value.'><br/>';
    }
      ?>
        </div>

       <?php update_phone( $_SESSION['id']);?>


        <input class="btn_form " name="update" type="submit" value="update" onClick="document.location.reload(true)" />






      </form>


    </div>




  </div>




</section>


</body>
</html>
