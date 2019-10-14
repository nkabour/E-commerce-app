
<?php

function addproduct($admin_id)
{     


  if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );

  if (isset($_REQUEST['Add'])) {



   $type=$_POST['producttype'];
   $pname=$_POST['ProductName'];
   $pdes=$_POST['description'];

   $error=array();
   if(!empty($error))
   {
    for($i=0; $i<count($error); $i++)
    {
      echo "<p class=\"error\">";
      echo $error[$i];
      echo "</p>";
    }
  }

  if ($type=="ingredients") {

    $query="insert into  ingredients (Name,Description,admin_ID) values ('".$pname."', '".$pdes."', '".$_SESSION['id']."')";

    if ( !( $result = mysqli_query($connection,$query) ) ) 
    {
      print( "<p>Could not execute query!</p>" );
      die( mysqli_error($connection) . "</body></html>" );
    }


    echo "<br> New  ingredients was added successfully!!";

    return $result;
  }
  else {

    $query="insert into scents (SName,Description, adminID) values ('".$pname."', '".$pdes."', '".$_SESSION['id']."')";

    if ( !( $result = mysqli_query($connection,$query) ) ) 
    {
      print( "<p>Could not execute query!</p>" );
      die( mysqli_error($connection) . "</body></html>" );
    }

    echo "<br> New  scents was added successfully!!";


    return $result;
  }

}

}




function addreco($admin_id)
{     


  if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );

  if (isset($_REQUEST['Addrec'])) {



   $mix=$_POST['mixid'];
   

   $error=array();
   if(!empty($error))
   {
    for($i=0; $i<count($error); $i++)
    {
      echo "<p class=\"error\">";
      echo $error[$i];
      echo "</p>";
    }
  }

 

    $query="insert into  recommended_mixtures (adID,IMixID) values ('".$_SESSION['id']."', '".$mix."')";

    if ( !( $result = mysqli_query($connection,$query) ) ) 
    {
      print( "<p>Could not execute query!</p>" );
      die( mysqli_error($connection) . "</body></html>" );
    }


    echo "<br> New  recommended mix was added successfully!!";

    return $result;
  }
  


}

