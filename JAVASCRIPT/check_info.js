

function start()
{
   var email=document.getElementById('Email');

   var npass=document.getElementById('New_Password');
   var cpass=document.getElementById('Confirm_Password');
   var pn1=document.getElementById('Phone_Number_1');
   var pn2=document.getElementById('Phone_Number_2');
   var zcode=document.getElementById('Zipcode');

   email.addEventListener("focusout",check_email);

   cpass.addEventListener("focusout",check_cpass);
   npass.addEventListener("focusout",check_npass);

   pn1.addEventListener("focusout",check_pn1);
   pn2.addEventListener("focusout",check_pn2);
   zcode.addEventListener("focusout",check_zip);

   var form=document.getElementById('edit_form');
   form.onsubmit= validate ;

}

function check_email()
{
 var email=document.getElementById('Email');
 if (email.value=="" || email.value==" ")
 {
   email.style.borderBottom="2px solid #900C3F";
   email.setAttribute("value"," ");
   document.getElementById('error1').innerHTML="Oops! email is empty ";
 }
 else if(!email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
 {
  email.style.borderBottom="2px solid #900C3F";
  email.setAttribute("value"," ");
  document.getElementById('error1').innerHTML="Oops! invalid format ";

 }
 else {
  email.style.borderBottom="2px solid #e6e6e6";
  document.getElementById('error1').innerHTML="";
 }


}



function check_pn1()
{
  var pn=document.getElementById('Phone_Number_1');


  if (pn.value=="" ||  pn.value==" ")
  {
    pn.style.borderBottom="2px solid #900C3F";
    pn.setAttribute("value","");
    document.getElementById('error3').innerHTML="Oops! Phone number 1 is required";
  }
  else if(!pn.value.match(/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/))
  {
   pn.style.borderBottom="2px solid #900C3F";
     pn.setAttribute("value"," ");
   document.getElementById('error3').innerHTML="Oops! Invalid format ex: ###-####-#### ";

  }
  else {
   pn.style.borderBottom="2px solid #e6e6e6";
   document.getElementById('error3').innerHTML="";
  }

}

function check_pn2()
{

  var pn=document.getElementById('Phone_Number_2');

  if (pn.value=="" ||  pn.value==" ")
  {
    pn.style.borderBottom="2px solid #e6e6e6";
    document.getElementById('error3').innerHTML="";
  }
  else if(!pn.value.match(/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/))
  {
   pn.style.borderBottom="2px solid #900C3F";
   pn.setAttribute("value"," ");
   document.getElementById('error3').innerHTML="Oops! Invalid format ex: ###-####-#### ";

  }
  else {
   pn.style.borderBottom="2px solid #e6e6e6";
   document.getElementById('error3').innerHTML="";
  }
}


function check_zip()
{
var zip=document.getElementById('Zipcode');

if (zip.value=="")
{
  zip.style.borderBottom="2px solid #900C3F";
  zip.setAttribute("value","");
  document.getElementById('error4').innerHTML="Oops! Zipcode is empty ";
}
else if(zip.value.length!=5)
{
 zip.style.borderBottom="2px solid #900C3F";
 zip.setAttribute("value","");
 document.getElementById('error4').innerHTML="Oops! Zipcode is 5 digts number ";

}
else {
 zip.style.borderBottom="2px solid #e6e6e6";
 document.getElementById('error4').innerHTML="";
}

}


function check_cpass()
{
  var npass=document.getElementById('New_Password');
  var cpass=document.getElementById('Confirm_Password');

  if (cpass.value=="" || cpass.value==" ")
  {
    npass.style.borderBottom="2px solid #e6e6e6";
    document.getElementById('error2').innerHTML="";

  }
  else if ( cpass.value!=npass.value )
  {
    cpass.style.borderBottom="2px solid #900C3F";
    cpass.setAttribute("value","");
    document.getElementById('error2').innerHTML="Oops! confirm password don't match new password";
  }
  else {
   cpass.style.borderBottom="2px solid #e6e6e6";
   document.getElementById('error2').innerHTML="";
  }



}

function check_npass()
{
  var npass=document.getElementById('New_Password');

  if (npass.value=="" || npass.value==" ")
  {
    npass.style.borderBottom="2px solid #e6e6e6";
    document.getElementById('error2').innerHTML="";

  }
  else if(!npass.value.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/))
  {
   npass.style.borderBottom="2px solid #900C3F";
   npass.setAttribute("value","");
   document.getElementById('error2').innerHTML="Password should be at least 8 characters <br> and containing at least 1 number and 1 letter";

  }
  else {
   npass.style.borderBottom="2px solid #e6e6e6";
   document.getElementById('error2').innerHTML=" ";
  }


}


function validate()
{
  if(document.getElementById('error1').innerHTML!="")
  {
      alert("please check your email");
      return false;
  }
  else if(document.getElementById('error2').innerHTML!="")
  {
      alert("please check your new or confirm password");
      return false;
  }
  else if(document.getElementById('error3').innerHTML!="")
  {
    alert("please check your phone numbers");
  return false;
  }
  else if(document.getElementById('error4').innerHTML!="")
  {
      alert("please check your zipcode");
      return false;
  }
  else if(document.getElementById('contery').value=="Choose Your Contery")
  {
      alert("You didn't choose your contery!");
      return false;
  }
  else
  {
    alert("chagnges are updated successfully!");
      return true;
  }


}



window.addEventListener("load",start,false);
