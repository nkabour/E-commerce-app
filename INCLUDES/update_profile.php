<?php

function update_accountinfo($customer_id)
{


    if(isset($_POST['Email'])&& isset($_POST['update']))
    {
    $email=$_POST['Email'];
    $name=$_POST['Full_Name'];

      $error=array();

      if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $error[] = "Invalid email format";
      }
      if(!empty($error))
      {
        for($i=0; $i<count($error); $i++)
        {
          echo "<p class=\"error\">";
          echo $error[$i];
          echo "</p>";
        }
      }
      else {
      $query="select account.Username from `account` inner join customer on
        customer.cu_userName=account.Username and customer.idCustomer=\"".$customer_id."\"";
      $result=return_query($query);
      $username=mysqli_fetch_array($result);
      $query="update `account` SET `Email`=\"".$email."\",`Name`=\"".$name."\"
      WHERE `Username`=\"".$username[0]."\"";
      return_query($query);
      }
    }

}

function update_pass($customer_id)
{
  $errors=array();
  if(isset($_POST['Old_Password'])&&!empty($_POST['Old_Password']))
  {
    $opass=$_POST['Old_Password'];
    $npass=$_POST['New_Password'];
    $cpass=$_POST['Confirm_Password'];
    $query="select account.Username from `account` inner join customer on
      customer.cu_userName=account.Username and customer.idCustomer=\"".$customer_id."\"";
    $result=return_query($query);
    $result=mysqli_fetch_array($result);
    $username=$result[0];
    $query2="select account.Username from `account` where account.Username='$username' and Password=SHA1('$opass')";
    $oldpass=return_query($query2);

    if(mysqli_num_rows($oldpass)!=1)
    {
        $errors[]="Old password is wrong";
    }
    if($cpass!=$npass)
    {
      $errors[]="confirm password don't match new password";
    }
    if(!preg_match('/^(?=.\d)(?=.[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $npass ))  {
                $errors[]= 'Password should be at least 8 characters <br>and containing at least 1 number and 1 letter';
    }
    if(!empty($errors))
    {
      for($i=0; $i<count($errors); $i++)
      {
        echo "<p class=\"error\">";
        echo $errors[$i];
        echo "</p>";
      }
    }
    else
    {
      //check password format
      $query="update `account` SET `Password`=SHA1('$npass') WHERE `Username`=\"".$username."\"";
      return_query($query);
    }

  }

}

function update_phone($customer_id)
{

  if(isset($_POST['Phone_Number_1'])&& isset($_POST['update']))
  {
    $pn1=$_POST['Phone_Number_1'];
    $errors=array();

    if (empty($pn1)) {
      $errors[]="Phone number 1 is required";
    }
    else if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pn1))
    {
        $errors[]="invalid number format ###-####-####";
    }
    if(!empty($errors))
    {
      for($i=0; $i<count($errors); $i++)
      {
        echo "<p class=\"error\">";
        echo $errors[$i];
        echo "</p>";
      }
    }
    else
    {

    $query="update `customer` SET `Phone`=\"".$pn1."\" WHERE customer.idCustomer=\"".$customer_id."\"";
    return_query($query);
    }
  }

  if(isset($_POST['Phone_Number_2'])&& isset($_POST['update']))
  {
    $pn2=$_POST['Phone_Number_2'];
    $errors=array();

    if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pn2)&&!empty($pn2))
    {
        $errors[]="invalid number format ###-####-####";
    }
    if(!empty($errors))
    {
      for($i=0; $i<count($errors); $i++)
      {
        echo "<p class=\"error\">";
        echo $errors[$i];
        echo "</p>";
      }
    }
    else
    {

    $query="update `customer` SET `Phone2`=\"".$pn2."\" WHERE customer.idCustomer=\"".$customer_id."\"";
    return_query($query);
    }

  }


}

function update_Address($customer_id)
{
  if(isset($_POST['Streat_Address'])&& isset($_POST['update']))
  {
      $zipcode=$_POST['Zipcode'];
      $city=$_POST['City'];
      $country=$_POST['contery'];
      $stAddress=$_POST['Streat_Address'];

      if(strlen($zipcode)!=5)
      {
           echo "<p class=\"error\">";
           echo "zipcode should be five numbers";
           echo "</p>";

      } else if ($country=="Choose Your Contery")
      {
        echo "<p class=\"error\">";
        echo "Please Choose your countery";
        echo "</p>";
      }
      else{
        $query="update  `customer` SET `ZipCode`=\"".$zipcode."\",`City`=\"".$city."\",`Country`=\"".$country."\",
        `StreatAddress`=\"".$stAddress."\" WHERE customer.idCustomer=\"".$customer_id."\"";
        return_query($query);
      }

  }
}


?>
