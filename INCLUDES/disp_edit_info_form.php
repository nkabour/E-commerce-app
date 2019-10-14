<?php

function disp_text($names,$query,$flag)
  {
    if($flag)
    {
    $result=return_query($query);
    $result = mysqli_fetch_array($result);
    $counter=0;
    foreach($names as $name => $type)
    {
      $nm=str_replace(" ", "_", $name);
      echo "<tr><label for=".$name."><td>".$name.":</td>";
      echo "<td><input class=\"form-input\" id=\"".$nm."\" name=\"".$nm."\" type=\"".$type."\" value=\"".$result[$counter]."\" size=\"25\"></td></label></tr>";
      $counter++;
    }
    }
    else
    {
      foreach($names as $name => $type)
      {

        $nm=str_replace(" ", "_", $name);
        echo "<tr><label for=".$name."><td>".$name.":</td>";
        echo "<td><input class=\"form-input\" id=\"".$nm."\" name=\"".$nm."\" type=\"".$type."\" size=\"25\"></td></label></tr>";
      }
    }
  }

  function disp_contries($query)
  {
    $counties=array("Choose Your Contery","Saudi Arabia","Qatar","Kuawit","United Emarat State","Uman","Yaman");
    echo "<tr><label><td> Contery:</td>";
    echo "<td><select class=\"select_input\" id='contery' name=\"contery\">";
    $result=return_query($query);
    $result = mysqli_fetch_array($result);
    echo $result[0];
    foreach($counties as $element => $value)
    {
      if($value==$result[0])
      {
        echo "<option selected>".$value."</option>";
      }
      else
      {
        echo "<option>".$value."</option>";
      }
    }
    echo "</select></td></label></tr>";
  }

  function disp_form(){
    echo "<div class=\"address_info\"><table><tr>";
    echo "<label><td>Streat Address:</td>";
    echo  "<td><div>";
    echo "<textarea class=\"form-input\" name=\"address\"
    rows=\"2\" cols=\"12\" style=\"overflow-y:scroll\"></textarea></div>";
    echo " </td></label></tr>";
    $labels=array("Zipcode"=>"tele",
                        "City"=>"text");
      disp_text($labels);
      disp_contries();
    echo "</div>";
  }
?>
