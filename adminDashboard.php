
<?php session_start(); ?>
<!DOCTYPE html>
<!-- Yara Saeed Alhashim -->
<html>
<head>
  <meta charset = "utf-8">
  <title>Admin Page</title>
  <script type="text/javascript" src="admin.js"></script>
  <meta name="keywords" content="Admin,dashboard,Q&A,Support">


 <link rel="stylesheet" type="text/css" href="CSS/admin2css.css">
<!--  <link rel="stylesheet" type="text/css" href="CSS/Manage.css"> -->
</head>
<body>

  <!-- Navigations -->
  <section    class="navigation">

 <?php  include "INCLUDES/navi.php";?>

    <!-- Main Navigations -->


   <?php  include "INCLUDES/mainnav.php";?>
   <!--  Navigations Options -->

   <div class="options-wrapper">

     <div class="panel-option active ">
      <a href="admin2.php" id="Dashbored" class="function"><img class="icon-pic" src="IMG/dashbored.png"><p>Dashbored</p></a>
    </div>
  </div>

  <div class="options-wrapper">

    <div class="panel-option ">
      <a href="ManageProducts.php" id="manageproducts" class="function"><img class="icon-pic" src="IMG/manageproducts.png"><p>Manage Products</p></a>
    </div>
  </div>

  <div class="options-wrapper">

    <div class="panel-option ">
      <a href="ManageUserspage.php" id="manageusers" class="function"><img class="icon-pic" src="IMG/users.png"><p>Manage Users</p></a>

    </div>
  </div>

</section>

<!-- End Of Navigations -->




<!--  page content header -->
<section class="page-content">

<?php  include "INCLUDES/adminh.php";?>
  <!-- End Of page content header -->



  <!--  page content  -->
  <div class="content" class="wrapper2">


  <!-- ____________________________________States____________________________________
  -->
  <section class="panel " class="states">
    <div class="states" >
      <h3>Today's visits</h3>
      <img src="IMG/visits.png"  class="states-pic2" >
      <h3>2.900</h3>
    </div>
  </section>
  <section class="panel " class="states">
    <div class="states" >
      <h3>Today's Profit</h3>
      <img src="IMG/profit.png"  class="states-pic2" >
      <h3>50.900</h3>
    </div>
  </section>


  <section class="panel " class="states">
    <div class="states" >
      <h3>Today's Orders</h3>
      <img src="IMG/orders.png"  class="states-pic2" >
      <h3>7.700</h3>
    </div>
  </section>



  <section class="panel " class="states">
    <div class="states" >
      <h3>Total Customers Number</h3>
      <img src="IMG/customers.png"  class="states-pic2" >
      <h3>90.400</h3>
    </div>
  </section>



<!-- ____________________________________Website State ENd____________________________________
-->

<!--  _____________________________________________pie chart_________________________________________________ -->
<section class=" chartcenter">
  <div class="donut-chart-block block charts">
    <h2 class="titular ">Device Usage</h2>
    <div class="donut-chart">

      <div id="porcion1" class="recorte"><div class="quesito ios" data-rel="21"></div></div>
      <div id="porcion2" class="recorte"><div class="quesito mac" data-rel="39"></div></div>
      <div id="porcion3" class="recorte"><div class="quesito win" data-rel="31"></div></div>
      <div id="porcionFin" class="recorte"><div class="quesito linux" data-rel="9"></div></div>

      <p class="center-date charts">JUNE<br><span class="scnd-font-color charts">2013</span></p>
    </div>
    <ul class="os-percentages horizontal-list charts">
      <li>
        <p class="ios os scnd-font-color charts">iOS</p>
        <p class="os-percentage charts">21<sup>%</sup></p>
      </li>
      <li>
        <p class="mac os scnd-font-color charts">Mac</p>
        <p class="os-percentage charts">39<sup>%</sup></p>
      </li>
      <li>
        <p class="linux os scnd-font-color charts">Linux</p>
        <p class="os-percentage charts">9<sup>%</sup></p>
      </li>
      <li>
        <p class="win os scnd-font-color charts">Win</p>
        <p class="os-percentage charts">31<sup>%</sup></p>
      </li>
    </ul>
  </div>
</section>

<!--  _____________________________________________pie chart End_________________________________________________ -->


<!--
  ___________________________________________line chart___________________________ -->


  <section class="chartcenter ">

    <div class="line-chart-block block">

     <div class="line-chart">
       <div class='grafico'>
         <ul class='eje-y charts'>
           <li data-ejeY='30'></li>
           <li data-ejeY='20'></li>
           <li data-ejeY='10'></li>
           <li data-ejeY='0'></li>
         </ul>
         <ul class='eje-x charts'>
           <li>Apr</li>
           <li>May</li>
           <li>Jun</li>
         </ul>
         <span data-valor='25'>
           <span data-valor='8'>
             <span data-valor='13'>
               <span data-valor='5'>
                 <span data-valor='23'>
                   <span data-valor='12'>
                     <span data-valor='15'>
                     </span></span></span></span></span></span></span>
                   </div>

                 </div>

                 <ul class="time-lenght horizontal-list charts">
                  <li><a class="time-lenght-btn charts" href="#14">Week</a></li>
                  <li><a class="time-lenght-btn charts" href="#15">Month</a></li>
                  <li><a class="time-lenght-btn charts" href="#16">Year</a></li>
                </ul><h4 class="titular linetitle" >Daily Usage</h4>
                <ul class="month-data clear charts">
                  <li>
                    <p>APR<span class="scnd-font-color charts "> 2013</span></p>
                    <p><span class=" increment charts"> </span>21<sup>%</sup></p>
                  </li>
                  <li>
                    <p>MAY<span class="scnd-font-color charts"> 2013</span></p>
                    <p><span class=" increment charts"> </span>48<sup>%</sup></p>
                  </li>
                  <li>
                    <p>JUN<span class="scnd-font-color charts"> 2013</span></p>
                    <p><span class=" increment charts"> </span>35<sup>%</sup></p>
                  </li>
                </ul>

              </div>


            </section>

            <!-- _______________________________________Bar Chart____________________________________ -->
            <section class="chartcenter">


              <div class="bar-chart-block block">
                <h2 class='titular'>By City </h2>
                <div class='grafico bar-chart'>
                 <ul class='eje-y charts'>
                   <li data-ejeY='60'></li>
                   <li data-ejeY='45'></li>
                   <li data-ejeY='30'></li>
                   <li data-ejeY='15'></li>
                   <li data-ejeY='0'></li>
                 </ul>
                 <ul class='eje-x charts'>
                   <li data-ejeX='37'><i>Riyadh</i></li>
                   <li data-ejeX='56'><i>Jeddah</i></li>
                   <li data-ejeX='25'><i>Alkhobar</i></li>
                   <li data-ejeX='18'><i>Medina</i></li>
                   <li data-ejeX='45'><i>Dammam</i></li>
                   <li data-ejeX='50'><i>Mecca</i></li>
                   <li data-ejeX='33'><i>Jubail</i></li>
                 </ul>
               </div>
             </div>



           </section>




<!-- ____________________________________Top selling ingredients____________________________________
-->

       <?php

$query ="select  Name  FROM ingredients limit 3 ";

if ( !( $connection = mysqli_connect( "localhost","root", "" ) ) )
    die( "<p>Could not connect to database</p>" );


  if ( !mysqli_select_db($connection,"shampoo_factory") )
    die( "<p>Could not open  database</p>" );



  if ( !( $result = mysqli_query($connection,$query) ) )
  {
    print( "<p>Could not execute query!</p>" );
    die( mysqli_error($connection) . "</body></html>" );
  }


  mysqli_close( $connection );
  ?>




  <section class="panel">
  <h2>Top selling ingredients</h2>
  <ul>
   <?php

    while ( $row = mysqli_fetch_row( $result ) )
    {
      print( "<li>" );
      foreach ( $row as $value )
        print( "$value" );
      print( "</li>" );
    }
    ?>

  </ul>
</section>







<!-- ____________________________________Todays tasks____________________________________
-->

<script type="text/JavaScript">
        // function showMessage(){
        //     var message = document.getElementById("task_input").value;
        //     display_message.innerHTML= message;
        // }
        function testVariable() {
            var strText = document.getElementById("task_input").value;

            var result = strText ;
            document.getElementById('display_message').textContent = result;

        }
    </script>


<section class="panel " >
  <h2>Todays Tasks!</h2>
  <ul>
<li  ><p><span id = "display_message"></span></span></p></li>



</ul>
<p class="task">
<input type=text name="task" id="task_input" >
<input  type=submit name="submittask" onclick="testVariable()" >


</p>





</section>

<!--
text- -->

<!--
<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

<task2>
<section class="panel " >


<div id="myDIV" class="header" >
  <h2 >My To Do List</h2>
  <input   type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL">

</ul>



</section>

</task2> -->













<!-- ex-->



































</div>
</section>



</body>
</html>
