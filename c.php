<?php

if(isset($_POST['submit']))
{

	$name =$_POST['name'];
	$order =$_POST['order'];
	$Subject =$_POST['sub'];
	$Email =$_POST['email'];
	$msg =$_POST['message'];

	$mailTo = "2150003566@iau.edu.sa";
	$header = "From:".$Email;
	$txt="You have receved an e-mail from ".$name.".\n\n".$msg;

	mail($mailTo,$Subject,$txt,$header);
	header("Location: ContactUs.php?mailsent");
}



?>