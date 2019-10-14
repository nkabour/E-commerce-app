<?php


function cart_form($id,$mid)
{

  $sizes=array('Small','Medium','Large');

  echo " <div id=\"addToCart_$id\" class=\"overlay_\">
          <div class=\"popup_warn\">
         <a class=\"close_form\" href=\"#\">×</a>
       <form method='post' action='MyMixtures.php' 'id='addToCart_mix'>";
        echo "<div><label>Choose the size of your shampoo:";
       echo "<select name='size'>";
        foreach ($sizes as $element => $value) {
          if($value=='Medium') echo "<option selected>".$value."</option>";
          else echo "<option>".$value."</option>";
        }

        echo "</select></label></div>";

      echo "<div><label>How many do you want ? <input type='number' name='quantity'
       min='1' max='10' value='1'></label></div>";
       echo "<div><button class=\"add_to_cart\" name=\"add_to_cart".$id."\"
        type='submit' ><img src=\"IMG/add.png\" alt=\"add_to_cart\"></button></div>";

  echo  "</form></div></div>";


}


function edit_recommended($id)
{

  echo " <div id=\"edit_rec_$id\" class=\"overlay_\">
         <div class=\"popup_rec\">
          <div class=\"form_popup\"><a class=\"close_form\" href=\"#\">×</a>";
          echo "<p>You Can't Edit a Recommended Mixture!</p>";
  echo  "</div></div></div>";
}


function edit_form($id,$mid)
{

  $ingredients=get_ingrediants();
  $scents=get_scents();
  $colors=array("Choose Color","Pink","Blue","Orange","Green","Red","White","Selver","Gold","Yellow","Purpel");
  echo " <div id=\"edit_$id\" class=\"overlay_\">
         <div class=\"popup_edit\">
          <div class=\"form_popup\"><a class=\"close_form\" href=\"#\">×</a>";
           echo "<form method='get' action='MyMixtures.php'>";
           echo  "<div><label> Mix Label: <input type=\"text\" size=\"25\" class=\"form_popup\" name=\"label\"></label></div>";
            echo  "<label>Color: <select class=\"select_input\" name=\"color\">";
            foreach ($colors as $element => $value) {
              echo "<option>".$value."</option>";
            }
            echo "</select><label>Scent:<br><br>";
            while ($row = mysqli_fetch_row($scents))
            {
              foreach ($row as $element => $value) {
                  echo "<span class='button_group'><input  type='radio' name='smells' value='$value' >
                  <img src='IMG/$value.png' alt='$value'> $value</span><br><br>";
                }

              }

            echo "</label><label>Ingredients:<br><br>";
            while ($row = mysqli_fetch_row($ingredients))
            {
            foreach ($row as $element => $value) {
                echo "<span class='button_group'><input type='checkbox' name='ingredients[]'
                 value='$value' ><img src='IMG/$value.png' alt='$value'> $value</span><br><br>";

              }

             }

            echo "</label><br><div class=\"form_btn\" >";
            echo "<button class=\"save\" name=\"save_$id\" type=\"submit\"><img src=\"IMG/save.png\" alt=\"save\" ></button></div>";
            echo  "</form></div></div></div>";

}




 ?>
