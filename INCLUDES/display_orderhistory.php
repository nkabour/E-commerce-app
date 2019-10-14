<?php


include "INCLUDES/query.php";

function db_order($customer_id)
{
  $query_order= "select OID,orderdate,shipdate,state,tottal_price from
   `orderhistory` where CID=\"".$customer_id."\"";

  return return_query($query_order);
}

function db_details($OID){

  $query_details= "SELECT Label, size, quantity FROM product, mixtures, orderitem WHERE MixID=MID AND product_id=ProductID
 AND order_history_id =$OID";

      return return_query($query_details);
}

function disp_tableContent($customer_id)
{

  $result_order=db_order($customer_id,true);
  $counter=0;

  if(mysqli_num_rows($result_order)==0)
  {
    echo "<h3 class='center'> You have no orders! </h3>";
  }
  else
  {
    echo " <thead>
          <tr>
            <th >Order ID</th>
            <th>Order Date/Time</th>
            <th>Ship Date</th>
            <th>Order State</th>
            <th>Total Price</th>
          </tr>
          </thead>";
  }
  echo "</tbody>";
  while ($row = mysqli_fetch_row($result_order))
  {


    if($counter%2==0)
    {
        echo "<tr class=\"even\">";

    }
    else {
        echo "<tr class=\"odd\">";
    }

    foreach ($row as $element => $value) {

          if($element=="OID")
          {
            echo "<td>";
            echo "<details id=\"Order_item\"><summary>";
            echo $value;
            echo "</summary>";
            disp_details($value);
            "</details>";
            echo "</td>";
          }
          else
          {
          echo "<td>";
          echo $value;
          echo "</td>";
          }
        }
      echo "</tr>";


  $counter++;
  }
  echo "</tbody>";
}

function disp_details($customer_id)
{
  $order_details=db_details($customer_id,false);

  while ($row = mysqli_fetch_assoc($order_details))
  {
  foreach ($row as $element => $value)
    {
      echo $element.": ".$value."<br><br>";

    }
  }


}

 ?>
