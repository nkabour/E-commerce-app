<?php

function get_ingrediants()
{
  $query= "select Name FROM `ingredients`;";
    return return_query($query);
}

function get_scents()
{
      $query= "select SName FROM `scents`;";
      return return_query($query);
}

function get_mixInfo($customer_id)
{
        $query="select MID,Label,Color,ScentName FROM `mixtures` inner join
         Creates_Add_Mix on mixtures.MID=Creates_Add_Mix.Mix_ID and Creates_Add_Mix.Customer_ID=\"".$customer_id."\"";
        return return_query($query);
}

function get_mixIngrediant($customer_id,$MID)
{
  $query="select mixtures_contains_ingrediants.IngrediantName FROM `mixtures_contains_ingrediants`
  inner join `mixtures` on mixtures.MID = mixtures_contains_ingrediants.MixID and mixtures_contains_ingrediants.MixID in
  (select MID FROM `mixtures` inner join Creates_Add_Mix on mixtures.MID=Creates_Add_Mix.Mix_ID and mixtures.MID=\"".$MID."\" and
  Creates_Add_Mix.Customer_ID=\"".$customer_id."\")";
  return return_query($query);
}




function disp_mix_ingrediants($customer_id,$MID)
{
  $counter=1;
  $mix_ingredients=get_mixIngrediant($customer_id,$MID);
  while ($row = mysqli_fetch_row($mix_ingredients))
  {
    foreach ($row as $element => $value) {
      echo $counter.".".$value."<br>";
      $counter++;
    }

  }

}

include 'INCLUDES/query.php';
include 'INCLUDES/mixtures_popups_forms.php';
include "INCLUDES/edit_table.php";


  $customer_id=$_SESSION['id'];
  $MID;
  $counter=0;
  $result=get_mixInfo($customer_id);
  $mid=array();
  if(mysqli_num_rows($result)==0)
  {
    echo "<h3 class='center'> Why not Creat a mixture?</h3>";
  }
  else
  {
    echo "<thead>
                      <tr>
                        <th>Mix Label</th>
                        <th> Color</th>
                        <th>Scent</th>
                        <th>Ingredients</th>
                        <th>Edit/Delete</th>
                        <th>Add To Cart</th>
                      </tr>
                    </thead>";
  }
  echo "<tbody>";
  while ($row = mysqli_fetch_row($result))
  {
    echo "<div><tr id=\"hide_".$counter."\">";
    foreach ($row as $element => $value) {
      if ($element=="MID")
        {
          $MID=$value;
          $mid[]=$MID;
       }
      else {
            echo "<td>";
            echo $value;
            echo "</td>";
            }
    }
    echo "<td>";
    disp_mix_ingrediants( $customer_id,$MID);
    $query="SELECT `Recommended` FROM `mixtures` WHERE MID='$MID'";
    $recommended=mysqli_fetch_row(return_query($query));
    if($recommended[0]==0)
    {

    echo "</td><td>";
    echo  "<a href=\"#edit_$counter\"><button class=\"edit\" name=\"edit_$counter\" >
       <img src=\"IMG/edit.png\" alt=\"edit\"></button></a>";

    }
    else
    { echo "</td><td>";
      echo"<a href='#edit_rec_$counter'><button class=\"edit\" name=\"edit_$counter\">
                 <img src=\"IMG/edit.png\" alt=\"edit\"></button></a>";

    }

    echo "<a href=\"#delete\"><button class=\"delete\" name=\"delete_".$counter."\" type=\"submit\" form=\"delete_mix\" ><img src=\"IMG/delete.png\" alt=\"delete\"></button></a>";
    echo "</td><td>";
    echo "<a href=\"#addToCart_$counter\"><button class=\"add_to_cart\" name=\"add_to_cart".$counter."\" ><img src=\"IMG/add_to_cart.png\" alt=\"add_to_cart\"></button></a>";
    echo "</td></tr></div>";
    edit_form($counter,$MID);
    edit_recommended($counter);
    cart_form($counter,$MID);
    $counter++;
  }
  echo "</tbody>";

  delete_row($mid,$customer_id);
  update($mid,$customer_id);
  add_to_cart($mid,$customer_id);

?>
