
  window.addEventListener( "load", start, false );
  var infoArray = [ "Please enter your full name, minimum length is 5 and only alphabets",
 "Please enter your username, minimum length is 5 ",
 "Please enter your e-mail in the format xxxx@xxxx.com",
 "Please enter you password, minimum length is 8, includes alphabets and digits",
 "Please re-enter your password",
  "" ];
 var infoText;
  function start()
 {
 infoText = document.getElementById( "info" );

 // register listeners
 registerListeners( document.getElementById( "fullname" ), 0 );
 registerListeners( document.getElementById( "username" ), 1 );
 registerListeners( document.getElementById( "email" ), 2 );
 registerListeners( document.getElementById( "password" ), 3 );
 registerListeners( document.getElementById( "passwordRepeat" ), 4 );

 }

 function registerListeners( object, messageNumber )
{

    object.addEventListener( "focus",
    function() { infoText.innerHTML = infoArray[ messageNumber ]; },false );
    object.addEventListener( "blur",
    function() { infoText.innerHTML = infoArray[5]; }, false );
} // end function registerListener


    var Fullname;
    var Pass;
    var Repass;
    var Uname;
    var email;
    var flagFname=false;
    var flagUname=false;
    var flagEmail=false;
    var flagPass=false;
    var flagRepass=false;


    function init()
    {
        Fullname = document.getElementById("fullname");
        Pass = document.getElementById("password");
        Repass = document.getElementById("passwordRepeat");
        Uname = document.getElementById("username");
        email = document.getElementById("email");

        //event change
        registerListenersFName(Fullname);
        registerListenersPass(Pass);
        registerListenersRepass(Repass, Pass);
        registerListenersUName(Uname);
        registerListenersEmail(email);

        var form = document.getElementById("myForm");
        form.onsubmit = validate;
    }

    function registerListenersFName(object)
    {
        object.addEventListener("change", function () {
            ckeckFname(object);
        }, false);
    } // end function registerListener
    function registerListenersUName(object)
    {
        object.addEventListener("change", function () {
            ckeckUname(object);
        }, false);
    } // end function registerListener
    function registerListenersPass(object)
    {
        object.addEventListener("change", function () {
            checkPass(object);
        }, false);
    } // end function registerListener
    function registerListenersRepass(Repass, Pass)
    {
        Repass.addEventListener("change", function () {
            ckeckRepass(Repass, Pass);
        }, false);
    } // end function registerListener
    function registerListenersUname(name)
    {
        name.addEventListener("change", function () {
            ckeckname(name);
        }, false);
    } // end function registerListener
    function registerListenersEmail(email)
    {
        email.addEventListener("change", function () {
            ckeckEmail(email);
        }, false);
    } // end function registerListener


    function ckeckFname(object)
    {
      if (!object.value.match(/^[a-zA-Z ]{5,}$/) )
        {

            object.style.borderBottom = "2px solid #900C3F";
            flagFname= false;
            return;
        }
        else{
            object.style.borderBottom = "2px solid #54DA5E";
            flagFname= true;
          }

    }
    function ckeckUname(object)
    {
      if (!object.value.match(/^[a-zA-Z]+.[a-zA-Z0-9]{4,}$/))
        {

            object.style.borderBottom = "2px solid #900C3F";

            flagUname= false;
            return;
        }
        else{
            object.style.borderBottom = "2px solid #54DA5E";
            flagUname= true;
          }

    }
    function checkPass(object)
    {
      if(!object.value.match(/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/))
        {

            object.style.borderBottom = "2px solid #900C3F";
            flagPass= false;
            return;
        }
        else{
            object.style.borderBottom = "2px solid #54DA5E";
            flagPass= true;
          }

    }
    function ckeckRepass(Repass, pass)
    {
      if(Pass.value != Repass.value)
        {

            Repass.style.borderBottom = "2px solid #900C3F";
            flagRepass= false;
            return;
        }
        else{
            Repass.style.borderBottom = "2px solid #54DA5E";
            flagRepass= true;
          }

    }
    function ckeckEmail(email)
    {
      if (!email.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){

            email.style.borderBottom = "2px solid #900C3F";
            flagEmail= false;
            return;
        }
        else{
            email.style.borderBottom = "2px solid #54DA5E";
            flagEmail= true;
          }

    }

    function validate(){

      if(flagFname && flagUname & flagPass && flagRepass && flagEmail)
      {
        return true;
      }
      else {
        return false;
      }

    }

    window.addEventListener("load", init, false);
