
<?php
function validate( $password, $repass, $username, $fullname, $email)
{
                //email check
              if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $error[] = "Invalid email format";
              }
               //password not empty checked
              if (empty($password) || empty($repass)){
                  $error[] = 'Both Passwords should not be empty';
                }
                // Password Matching Validation
              if($password != $repass){
                $error[] = 'Passwords should be same';
              }
                //password lenght atleast 8 and contain atleast 1 character and digit
              if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $password ))  {
                $error[]= 'Passwords should be at least 8 characters containing at least 1 number and 1 letter';
              }
                //name is only alphabets
              if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
                $error[] = "Only letters are allowed in full name";
              }
              //check name not empty
              if (empty($fullname)){
                $error[] = "Full name should not be empty";
              }
              //check name not empty
              if (empty($username)){
                $error[] = "Username should not be empty";
              }


               $con;

              if(!isset($error) && empty($errors))
                    {
                      //database credentials
                      define('DBHOST','localhost');
                      define('DBUSER','root');
                      define('DBPASS','');
                      define('DBNAME','shampoo_factory');
                      $account_type="C";

                      // Connect to database
                     $con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
                     if ($con->connect_error) {
                       die("Connection failed: " . $con->connect_error);  }

                     //prepare query
                     $stmt = $con->prepare("SELECT Username FROM account WHERE Username= ? ");
                     $stmt->bind_param('s', $username);
                     $stmt->execute();
                     $stmt->store_result();

                     if( $stmt->num_rows==0)  //To check if the row exists
                         {   $id="";
                             $stmt->close();
                             //prepare query insert into account table
                             $stmt2 = $con->prepare(" INSERT INTO account (Username, Password, email, Name ) VALUES ( ?, ?, ?, ? ) " );
                             $stmt2->bind_param('ssss', $username, SHA1("$password"), $email, $fullname);

                              //prepare query insert into type of account table
                             $stmt3 = $con->prepare( " INSERT INTO  type_of_accout (username, AccountType ) VALUES ( ?, ? ) " );
                             $stmt3->bind_param('ss', $username, $account_type);

                              //prepare query insert into customer table
                             $stmt4 = $con->prepare( " INSERT INTO  customer (idCustomer, cu_userName ) VALUES ( ?, ? ) " );
                             $stmt4->bind_param('is', $id, $username);

                              if($stmt2->execute() and  $stmt3->execute() and $stmt4->execute()){

                                $stmt2->close();
                                $stmt3->close();
                                $stmt4->close();
                                // find the new customer id
                                $stmt5 = $con->prepare("SELECT idCustomer from customer where cu_userName=?");
                                $stmt5->bind_param('s', $username);
                                $stmt5->execute();
                                $stmt5->bind_result($id);
                                $result = $stmt5->fetch();

                                // Set the session data:
                                  session_start();
                                  $_SESSION['username'] = $username;
                                  $_SESSION['id']= $id;
                                  $_SESSION['logged']=1;
                                  header("Location: index.php");
                                  $stmt5->close();
                                  $con->close();

                                  exit;

                             }
                             else {
                               //$er=$stmt2->error;
                               print("<script type='text/javascript'>alert('The E-mail is already registered, please choose another one');</script>");

                             }


                         }
                         else {
                             $con->close();
                             $stmt->close();

                             print("<script type='text/javascript'>alert('The Username is taken, please choose another one');</script>");
                         }
              }
              else {
                for($i=0; $i<count($error); ++$i)
                      $msg=implode("  ",$error);

                print("<script type='text/javascript'>alert('$msg');</script>");
              }
}
?>
