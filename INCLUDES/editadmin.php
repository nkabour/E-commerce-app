
<?php



  
  

function update_accountinfo($admin_id)
{     
if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );


    if(isset($_POST['update']))
    {
    $email=$_POST['email'];
    $name=$_POST['FN'];

      $error=array();

      if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $error[] = "Invalid email format";
      }
      if(!empty($error))
      {
        for($i=0; $i<count($error); $i++)
        {
          echo "<p class=\"error\">";
          echo $error[$i];
          echo "</p>";
        }
      }
      else {
      
      $query="update account SET Email ='".$email."' , Name='".$name."' WHERE Username='".$_SESSION['username']."'";
      

      $result = mysqli_query($connection,$query) ;
 return $result;
    }

}}
function update_phone($admin_id)
{     
if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );


    if(isset($_POST['update']))
    {
    $phone=$_POST['phone'];
    

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
      else {
      // $query="SELECT Name FROM account WHERE Username='".$_SESSION['username']."'";
      // $result=return_query($query);
      // $username=mysqli_fetch_array($result);
      $query="update admin SET PhoneNumber ='".$phone."'  WHERE ad_userName='".$_SESSION['username']."'";
      

      $result = mysqli_query($connection,$query) ;
 return $result;
    }

}}