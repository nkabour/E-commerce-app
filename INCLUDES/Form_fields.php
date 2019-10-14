<?php
   function input($label, $for, $type, $name, $placeholder, $value)
  {
    if($name=="fullname" || $name=="username")
      $auto=' autofocus autocomplete="on" ';
    elseif($name=="password" || $name=="passwordRepeat")
         $auto=' ';
    else {
      $auto=' autocomplete="on" ';
    }
    echo "<div class='form-label'> <label for='$for'> $label </label> <input class='form-input' type='$type' name='$name' id='$name' value='$value' placeholder=' $placeholder ' $auto required  minlength='5' /> </div>";

  }



?>
