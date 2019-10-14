<?php
 function return_query($query)
{
  require('INCLUDES/DB_Connect.php');
  if(!($result=mysqli_query($db,$query)))
  {
    print("<p>Could not execute query!</p>");
    die(mysql_error()."</body></html>");
  }

  mysqli_close($db);
  return $result;
}

?>
