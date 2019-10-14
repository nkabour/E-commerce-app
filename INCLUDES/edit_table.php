<?php



function update($mid,$customer_id)
{

  for($i=0; $i<count($mid); $i++)
   {
     $id="save_$i";

       if(isset($_GET[$id]))
       {

            $MID=$mid[$i];
             if(!empty($_GET['label']))
             {

               $label=$_GET['label'];
               $query="UPDATE `mixtures` SET `Label`=\"".$label."\" where `mixtures`.`MID` = $MID ";
               return_query($query);
             }
             if(isset($_GET['color']))
             {

               $color=$_GET['color'];
               if($color!="Choose Color")
               {
                 $query="UPDATE `mixtures` SET `Color`='$color' where `mixtures`.`MID` = $MID ";
                 return_query($query);
               }

             }

             if(isset($_GET['smells']))
             {

               $scent=$_GET['smells'];
               $query="UPDATE `mixtures` SET `ScentName`='$scent' where `mixtures`.`MID` = $MID ";
               return_query($query);
             }
             if(isset($_GET['ingredients']))
             {

               $ing=$_GET['ingredients'];
               $ing_db=array();
                 if(count($ing)==2)
                 {

                   $mix_ingredients=get_mixIngrediant($customer_id,$MID);
                   while ($row = mysqli_fetch_row($mix_ingredients))
                   {
                     foreach ($row as $element => $value) {
                      $ing_db[]=$value;
                     }

                   }
                   for($j=0; $j<count($ing); $j++)
                   {
                     $ingredient=$ing[$j];
                     $query="UPDATE `mixtures_contains_ingrediants` SET `IngrediantName`='$ing[$j]' where `MixID`= $MID and
                     `mixtures_contains_ingrediants`.`IngrediantName`='$ing_db[$j]'";
                     return_query($query);
                   }
                 }
                 else
                 {
                   echo "<p class=\"error\">You must choose only two ingredients</p>";
                 }

             }

       }

     }


}

function delete_row($mid,$customer_id)
{


for($i=0; $i<count($mid); $i++)
 {
   $id="delete_$i";
   if(isset($_POST[$id]))
   {
      $MID=$mid[$i];
      $query="DELETE FROM `Creates_Add_Mix` WHERE `Creates_Add_Mix`.`Customer_ID` =
      $customer_id  AND `Creates_Add_Mix`.`Mix_ID` = $MID ";
      return_query($query);

   }
}

}


function add_to_cart($mid,$customer_id)
{


  for($i=0; $i<count($mid); $i++)
   {
     $id="add_to_cart$i";
     if(isset($_POST[$id]))
     {

        $MID=$mid[$i];
        $size=$_POST['size'];
        $quantity=$_POST['quantity'];
        if($_POST['size']=='Small')
          {$p=50;}
        elseif($_POST['size']=='Medium')
          {$p=100;}
        else
          {$p=150;}
        require('INCLUDES/DB_Connect.php');
        $q2="INSERT INTO `product`(`MixID`,`size`,`Price`) VALUES ($MID,'$size','$p')";
        //getting the last product id from the product table
        $pid;
        if(!($result=mysqli_query($db, $q2)))
        {
          print("<p>Could not execute query!</p>");
          die(mysql_error()."</body></html>");
        }

        $pid=mysqli_insert_id($db);
        //inserting into add to cart table
        $q4="INSERT INTO add_to_cart(C_ID,P_ID,quantity) VALUES ( '$customer_id','$pid','$quantity')";
        if(!($result=mysqli_query($db, $q4)))
        {
          print("<p>Could not execute query!</p>");
          die(mysql_error()."</body></html>");
        }

        mysqli_close($db);

     }
  }



}

?>
