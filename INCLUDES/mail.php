<?php
if(isset($_POST['email']))
{    


$orderNum = $_POST['order'];
$subj = $_POST['sub'];
$name = $_POST['name'];
$email = $_POST['Email'];
$txta = $_POST['txtArea'];



if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}



$formcontent=" From: $name \n Email: $email \n Subject: $subj \n Order: $orderNum \n Message: $txta";

$recipient = "Rwanabdullah1@gamil.com";
$subject = "Contact Us Form";
$mailheader = "From: $email \r\n";


mail($recipient, $subject, $formcontent, $mailheader);
echo "Thank You!";
header("Location: ContactUs.php");
                    exit;

}

?>