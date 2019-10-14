<?php

session_start();
?>
<!DOCTYPE html>
<!-- Yara Saeed Alhashim -->
<html>
<head>
  <meta charset = "utf-8">
  <title>Manage Products</title>
  <meta name="keywords" content="Admin,dashboard,Q&A,Support">
  <link rel="stylesheet" type="text/css" href="CSS/admin2css.css">
  <link rel="stylesheet" type="text/css" href="CSS/Manage.css">
  <script type="text/javascript" src="admin.js"></script>
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

  <div class="panel-option active">
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
  <div class="content " >


<?php


if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );
?>



    <ul class="tabs" role="tablist manage ">
      <li>
        <input type="radio" name="tabs" id="tab1" checked />
        <label for="tab1"
        role="tab"
        aria-selected="true"
        aria-controls="panel1"
        tabindex="0">Add Products:</label>
        <div id="tab-content1"
        class="tab-content"
        role="tabpanel"
        aria-labelledby="description"
        aria-hidden="false">
        <p>
<!-- Add product --> 
  <?php  include "INCLUDES/addproduct.php";?>
          <form action="ManageProducts.php" method="post" >

            
            <section class="input">
            
            <h3>Product Name:</h3>
            <input type="text" id="ProductNmae" name="ProductName" placeholder="Enter Name.."  >
            
            <h3>Product Type:</h3>
            <select id="producttype" name="producttype" >
              <option value="ingredients">ingredients</option>
              <option value="Scents">Scents</option>

            </select>


            <h3>Product description:</h3>
            <textarea id="description" name="description" placeholder="Write description.."  ></textarea>


               <?php  addproduct($_SESSION['id']);

                ?>
              
 
              
  <br>

            <input type="submit" name="Add" value="Add">

              
  <br>




<h3>Add recommended Mix: </h3>
      <?php

$q ="select MID FROM mixtures where `Recommended`=0 ";



  if ( !( $result = mysqli_query($connection,$q) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }

  
  mysqli_close( $connection );


    echo "<select name='mixid' id='mixid'   >";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $mixid = $row['MID'];
                  
                  echo '<option value="'.$mixid.'">'.$mixid.'</option>';
                 
}

    echo "</select>";
  
  addreco($_SESSION['id']);

                

  ?>


<br>


   <input type="submit" name="Addrec" value="Add">
   <br>
</section>


          </form>


        </p>
      </div>
    </li>





<!-- View ingredients -->
<?php 
$name = "";
  $Description ="";

  if (isset($_GET['edit'])) {
    $nameid = $_GET['edit'];
  
   
     $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");


    $q1="select Name , Description FROM ingredients where Name='".$nameid."'";
    
     if ( !( $result3 = mysqli_query($connection, $q1) ) )
  {
    print( "<p>Could not execute query! </p>" );
   
    die( mysqli_error($connection) . "</body></html>" );
  }



    if (mysqli_num_rows($result3) == 1 ) {
      $n = mysqli_fetch_array($result3);
      $name = $n['Name'];
      $Description = $n['Description'];
    }
  }




if (isset($_POST['update'])) {
  $nameid = $_POST['name'];
  $name = $_POST['ProductName2'];
  $Description = $_POST['Description2'];



$qupdate="update ingredients set Name='".$name."', Description='".$Description."' where Name='".$nameid."'";


     $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");
  
     if ( !( $result4 = mysqli_query($connection, $qupdate) ) )
  {
    print( "<p>Could not execute query! </p>" );
   
    die( mysqli_error($connection) . "</body></html>" );
  }

}




if (isset($_GET['del'])) {
  $nameid = $_GET['del'];

 $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");


    $q3="DELETE FROM ingredients WHERE  Name='".$nameid."'";
    
     if ( !( $result5 = mysqli_query($connection, $q3) ) )
  {
    print( "<p>Could not execute query! </p>" );
    echo $nameid;
    die( mysqli_error($connection) . "</body></html>" );
  }


 
}

?>
<section>
    <li>
      <input type="radio" name="tabs" id="tab2" />
      <label for="tab2"
      role="tab"
      aria-selected="false"
      aria-controls="panel2"
      tabindex="0">View ingredients:</label>
      <div id="tab-content2"
      class="tab-content"
      role="tabpanel"
      aria-labelledby="specification"
      aria-hidden="true">
      <p>
        <?php

$query ="select Name, Description FROM ingredients ";
$query2 ="select  SName, Description FROM scents ";

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
  mysqli_close( $connection );




  ?>



<table>
<thead>
    <tr>
      <th>Name</th>
      <th>description</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($result)) { ?>
    <tr>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['Description']; ?></td>
      <td>
        <a href="ManageProducts.php?edit=<?php echo $row['Name']; ?>"  >Edit</a>
      </td>
      <td>
        <a href="ManageProducts.php?del=<?php echo $row['Name']; ?>" >Delete</a>
      </td>
    </tr>
  <?php } ?>
    

    

  </table>
<form method="post" action="ManageProducts.php" >
 <section class="input">


                 <input type="hidden" name="name" value="<?php echo $name; ?>">
            
            <h3>Product Name:</h3>
            <input type="text" id="ProductNmae" name="ProductName2" placeholder="Enter Name.." value="<?php  echo $name; ?>"  >
            
        

            <h3>Product description:</h3>
            <textarea id="description" name="Description2" placeholder="<?php  echo $Description; ?>"  ></textarea>
             <br>


  <input  type="submit" name="update" id="update" value="update" >
            

</form>
           


          
  <br>
    </p>
  </div>
</li>




</section>






<section>


<!-- -view sents -->

<?php 
$name = "";
  $Description ="";

  if (isset($_GET['edit'])) {
    $nameid = $_GET['edit'];
  
   
     $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");


    $q1="select SName , Description FROM scents where SName='".$nameid."'";
    
     if ( !( $result3 = mysqli_query($connection, $q1) ) )
  {
    print( "<p>Could not execute query! </p>" );
   
    die( mysqli_error($connection) . "</body></html>" );
  }



    if (mysqli_num_rows($result3) == 1 ) {
      $n = mysqli_fetch_array($result3);
      $name = $n['SName'];
      $Description = $n['Description'];
    }
  }




if (isset($_POST['update'])) {
  $nameid = $_POST['name'];
  $name = $_POST['ProductName2'];
  $Description = $_POST['Description2'];



$qupdate="update scents set SName='".$name."', Description='".$Description."' where SName='".$nameid."'";


     $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");
  
     if ( !( $result4 = mysqli_query($connection, $qupdate) ) )
  {
    print( "<p>Could not execute query! </p>" );
   
    die( mysqli_error($connection) . "</body></html>" );
  }

}




if (isset($_GET['del'])) {
  $nameid = $_GET['del'];

 $connection = mysqli_connect( "localhost","root", "" );
     mysqli_select_db($connection,"shampoo_factory");


    $q3="DELETE FROM scents WHERE  SName='".$nameid."'";
    
     if ( !( $result5 = mysqli_query($connection, $q3) ) )
  {
    print( "<p>Could not execute query! </p>" );
    echo $nameid;
    die( mysqli_error($connection) . "</body></html>" );
  }


 
}

?>





<li>
  <input type="radio" name="tabs" id="tab3" />
  <label for="tab3"
  role="tab"
  aria-selected="false"
  aria-controls="panel3"
  tabindex="0">View Scents: </label>
  <div id="tab-content3"
  class="tab-content"
  role="tabpanel"
  aria-labelledby="specification"
  aria-hidden="true">
  <p>

 <?php

$query ="select Name, Description FROM ingredients ";
$query2 ="select  SName, Description FROM scents ";

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
  mysqli_close( $connection );




  ?>



<table>
<thead>
    <tr>
      <th>Name</th>
      <th>description</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($result2)) { ?>
    <tr>
      <td><?php echo $row['SName']; ?></td>
      <td><?php echo $row['Description']; ?></td>
      <td>
        <a href="ManageProducts.php?edit=<?php echo $row['SName']; ?>"  >Edit</a>
      </td>
      <td>
        <a href="ManageProducts.php?del=<?php echo $row['SName']; ?>" >Delete</a>
      </td>
    </tr>
  <?php } ?>
    

    

  </table>
<form method="post" action="ManageProducts.php" >
 <section class="input">


                 <input type="hidden" name="name" value="<?php echo $name; ?>">
            
            <h3>Product Name:</h3>
            <input type="text" id="ProductNmae" name="ProductName2" placeholder="Enter Name.." value="<?php  echo $name; ?>"  >
            
        

            <h3>Product description:</h3>
            <textarea id="description" name="Description2" placeholder="<?php  echo $Description; ?>"  ></textarea>
             <br>


  <input type="submit" name="update" id="update" value="update" >
            

</form>
           


          
  <br>
    </p>
  </div>
</li>

</section>









</body>
</html>
