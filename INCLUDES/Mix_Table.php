

<?php

function mix_table(){
//database credentials
  define('DBHOST','localhost');
  define('DBUSER','root');
  define('DBPASS','');
  define('DBNAME','shampoo_factory');
  // Connect to database
  $con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }


  //prepare query
  $query = "SELECT Color, Label, ScentName, IngrediantName, MID from mixtures_contains_ingrediants, mixtures, recommended_mixtures WHERE MixID=MID AND IMixID=MID ";

  // Escape Query
  $query = mysqli_real_escape_string($con,$query);


  // Perform Query
  if($result = mysqli_query($con,$query))
  {

     // Cycle through results
     $counter=1;

     while($counter<4)
     {
              $row = mysqli_fetch_array($result);
              $Label=$row['Label'];
              $color=$row['Color'];
              $ing1=$row['IngrediantName'];
              $scent=$row['ScentName'];
              $MID=$row['MID'];
              $ing2;
              $row2 = mysqli_fetch_array($result);
              if($Label==$row2['Label'])
                 $ing2=$row2['IngrediantName'];

            print('
            <div class="slide'.$counter.'">

            <img src="IMG/'. $color .'.png " class="Shampooimg" alt="Reccomended shampoo Mixture" />

              <!--the table of mixture content-->
                <table border = "0" class="slideshowtable">
                  <tbody>

                    <tr>
                      <td colspan="2" class="shampooName">'. $Label  .' </td>
                    </tr>

                    <tr>
                      <td colspan="2">Color:</td>
                    </tr>

                    <tr>
                      <td> <img src="IMG/color.png " alt="mixture color" title="mixture color" /> </td>
                      <td>'. $color .'</td>

                    </tr>

                    <tr>
                      <td colspan="2">Ingredients:</td>
                    </tr>

                    <tr>
                      <td> <img src="IMG/'.$ing1.'.png " alt="'.$ing1.' Ingredient" title="'.$ing1.' Ingredient"/> </td>
                    <td>'.$ing1.'</td>

                    </tr>

                    <tr>
                      <td> <img src="IMG/'.$ing2.'.png " alt="'.$ing1.' Ingredient" title="'.$ing2.' Ingredient"/></td>
                    <td>'.$ing2.'</td>

                    </tr>

                    <tr>
                    <td colspan="2"> Scent: </td>
                    </tr>

                    <tr>
                      <td> <img src="IMG/'.$scent.'.png " alt="'.$scent.' title="'.$scent.' Scent" /></td>
                      <td>'.$scent.' </td>

                    </tr>
                  </tbody>
                  </table>');
                  if(isset($_SESSION['username']))
                  {
                    print(' <!--add mixture to my mixs menu pop up-->
                    <div id="popup'.$counter.' class="center"">
                       <form name="addRecMix" action="" method="post">
                            <input type="hidden" name="mid" value="'.$MID.'">
                            <button type="submit" value="Add" name="add" class="add AddMixbutton">Add Mix to My Mixs</button>
                       </form>
                   </div>
                 </div>');
                 }


                  else{
                    print('
                    <!--button to add mixture to my mixs -->
                    <a class="add AddMixbutton buttonLink" href="#popup1">Add mix to My Mixs</a>
                  </div>');
                          print("
                          <!--error add mixture to my mixs menu pop up-->
                        <div id='popup1' class='overlay'>
                          <div class='popup'>
                            <a class='closeError' href='#'>&times;</a>

                              <div class='errorDiv'> <p> You Must Be Signed In To Add Mixs To Your List!
                              <a href='Signin.php'>Sign In Now</a></p></div>
                          </div>
                        </div><!-- popup div-->");
                      }



                  $counter=$counter+1;

       }
                $con->close();
                mysqli_free_result($result);






     }
  }


?>
