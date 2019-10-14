<?php  session_start(); ?>

<!DOCTYPE html>

<!-- Nora Al Babtain-->

<html>
<head>
  <title>Shampoo Factory - Create your shampoo </title>
  <link rel="icon" href="IMG/shampoo logo.jpeg" />
  <!-- <script type="text/javascript" src="JAVASCRIPT/createshapoo.js"></script> -->
  <link rel="stylesheet" type="text/css" href="CSS/mainStyle.css">
  <link rel="stylesheet" type="text/css" href="CSS/createshampoo.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css" />

<?php

       if(isset($_GET["logout"])){
         $_SESSION = array(); // Clear the variables.
        session_destroy(); // Destroy the session itself.
       }

       ?>
<script>
  $(function() {

    $('.scotch-panel').scotchPanel({
        containerSelector: '#super-container',
        distanceX: '30%'
    });

});</script>

  <meta name = "keywords" content = "website, shampoo, customize, shop, create, natural" charset="utf-8">
</head>


<body> 

      <!-- Menu Bar-->
      <?php  include "INCLUDES//Header.php";?>   <!-- header file-->

  <!-- Main heading of page-->
    <h1 class="H1_headingCookie"> Create your own shampoo!</h1>
    <h3> just follow these simple steps  </h3>



<!-- the form for the making of shampoo -->
<form id="shampform"  form action="Cart.php" method="post" name="sha" >
	<!-- One "tab" for each step in the form: -->
	 <div class="container">
		<div class="tab"> <h4>Choose the ingredients that you want:</h4><?php

function writeMsg() {
			// Connect to database
			$link = mysqli_connect('localhost','root','','shampoo_factory');
			// Check for Errors
			if(mysqli_connect_errno())
			{
			  print("error");
			  echo mysqli_connect_error();
			}
			// Prepare Query
			$query = "SELECT Name,Description FROM ingredients";

			// Escape Query
			$query = mysqli_real_escape_string($link,$query);

			// Perform Query
			if($result = mysqli_query($link,$query)){

			 // Cycle through results
			echo "<a href='#' onclick='alert (  ".'&#039';
			 while($row = mysqli_fetch_row($result))
			 {

			      foreach( $row as $element => $key)
			    {
			      echo "$key  ";
			  }
			  echo'\n';
			 }
			 echo " ".'&#039'. ")' >
           <img src='IMG/help.png' alt='help' title='help'>
            </a>";
			 // Free Result Set
			 mysqli_free_result($result);

			}
			
			// Close Connection
			mysqli_close($link);}
			echo"<center>";
			writeMsg();
			echo"</center>";
			
			?>
			<table class="center1" border="0" >
			<?php
			// Connect to database
			$link = mysqli_connect('localhost','root','','shampoo_factory');
			// Check for Errors
			if(mysqli_connect_errno())
			{
			  print("error");
			  echo mysqli_connect_error();
			}
			// Prepare Query
			$query = "SELECT Name FROM ingredients";

			// Escape Query
			$query = mysqli_real_escape_string($link,$query);

			// Perform Query
			if($result = mysqli_query($link,$query)){

			 // Cycle through results
			 $x=1;
			 while($row = mysqli_fetch_row($result))
			 {

			      foreach( $row as $element => $key)
			    { if ($x%2!=0) { print("<tr> ");}
			      print " <td> <input type='checkbox' name='ingredients[]' value='$key' onClick='return KeepCount()'><img src='img/$key.png' alt='$key'> $key </td> ";
			     if($x% 2 == 0){print("</tr> ");}
			     $x++;
			  }
			 }
			 // Free Result Set
			 mysqli_free_result($result);

			}
			// Close Connection
			mysqli_close($link);

			?>

		</table>
		<p class="center"> <br> <br> <br>  please select only 2 if not , we will only take the first 2 ingredients you selected </p> 

		</div>
		<div class="tab"> <h4>Choose your prefered smell :</h4>
			<table border="0" class="center1">
		<?php
		// Connect to database
		$link = mysqli_connect('localhost','root','','shampoo_factory');
		// Check for Errors
		if(mysqli_connect_errno())
		{
		  print("error");
		  echo mysqli_connect_error();
		}
		// Prepare Query
		$query = "SELECT SName FROM scents";

		// Escape Query
		$query = mysqli_real_escape_string($link,$query);

		// Perform Query
		if($result = mysqli_query($link,$query)){

		 // Cycle through results
		 $x=1;
		 while($row = mysqli_fetch_row($result))
		 {

		      foreach( $row as $element => $key)
		    { if ($x%2!=0) { print("<tr> ");}
		      print " <td> <input type='radio' name='smells' value='$key' ><img src='img/$key.png' alt='$key'> $key </td> ";
		     if($x% 2 == 0){print("</tr> ");}
		     $x++;
		  }
		 }
		 // Free Result Set
		 mysqli_free_result($result);

		}
		// Close Connection
		mysqli_close($link);

		?>			</table>
		</div>
		<div class="tab"><h4> What do you want to write on the label ?</h4>
			<p><input type="text" name="label" placeholder="write it here"></p>
		</div>
		<div class="tab"><h4> What color do you want the shampoo to be ?</h4>
			<center><?php
		$colors=array("Pink","Blue","Orange","Green","Red","White","Selver","Gold","Yellow","Purpel");
		echo  "<select  name=color>";
		  foreach ($colors as $element => $value) {
		    echo "<option>".$value."</option>";
		  }
		  echo "</select>";
		  ?></center>
		</div>
		<div class="tab"><h4> Choose the size of your shampoo :</h4>
			<center><select name="size">
			    <option value="Small">Small</option>
			    <option value="Medium" selected>Medium</option>
			    <option value="Large">Large</option>
			</select></center>
		</div>
		<div class="tab"> <h4>How many do you want ? </h4>
			<p><input type="number" name="quantity" min="1" max="10" placeholder="Maximum 10"></p>
		</div>
		<div class="tab"><h4> Are you sure about your order ?</h4>
			<p> if yes click "add to cart and your mixes" button  </p>
		</div>

		<div style="overflow:auto;">
		    <div >
		    <button type="button"  class="buttonform" id="prevBtn" onclick="nextPrev(-1)" style="float:left;">Previous</button>
		    <button type="button"  class="buttonform" id="nextBtn" onclick="nextPrev(1)" style="float:right;">Next</button>
		 	</div>
		</div>
		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		</div>
	</div></form>
<!--Java script for the form-->
 <script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the crurrent tab

	function showTab(n) {
	  // This function will display the specified tab of the form...
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  //... and fix the Previous/Next buttons:
	  if (n == 0) {
	    document.getElementById("prevBtn").style.display = "none";
	  } else {
	    document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
	    document.getElementById("nextBtn").innerHTML = "Add to cart and your mixes";
	  } else {
	    document.getElementById("nextBtn").innerHTML = "Next";
	  }
	  //... and run a function that will display the correct step indicator:
	  fixStepIndicator(n)
	}

	function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  x[currentTab].style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form...
	  if (currentTab >= x.length) {
	    // ... the form gets submitted:
	    document.getElementById("shampform").submit();
	    return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}

	function validateForm() {
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
	  // A loop that checks every input field in the current tab:
	  for (i = 0; i < y.length; i++) {
	    // If a field is empty...
	    if (y[i].value == "") {
	      // add an "invalid" class to the field:
	      y[i].className += " invalid";
	      // and set the current valid status to false
	      valid = false;
	    }
	  }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
	    document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}

	function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	    x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class on the current step:
	  x[n].className += " active";}

     $(document).ready(function () {
   $("input[name='ingredients']").change(function () {
      var maxAllowed = 2;
      var cnt = $("input[name='ingredients']:checked").length;
      if (cnt > maxAllowed)
      {
         $(this).prop("checked", "");
         alert('Select maximum ' + maxAllowed + 'ingredients');
     }
  });
});

</script>




<?php  include "INCLUDES//Footer.php"; ?> <!-- footer file-->

</body>
</html>
