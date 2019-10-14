<?php
  function login($username, $password){
    $errors = array(); // Initialize an error array.

    // Check for the username:
    if (empty($username)) {
      $errors[] = 'You forgot to enter your username.';
    } else {
      $username = trim($username);
    }

    // Check for the pass:
    if (empty($password)) {
      $errors[] = 'You forgot to enter your password.';
    } else {
      $password = trim($password);
    }

    if(!isset($error) && empty($errors)) { // If everything's OK.
          //database credentials
          define('DBHOST','localhost');
          define('DBUSER','root');
          define('DBPASS','');
          define('DBNAME','shampoo_factory');
          // Connect to database
          $con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
          if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);}

          //prepare query
          $stmt = $con->prepare("SELECT username, password FROM account WHERE username=? AND  password=? LIMIT 1");
          $stmt->bind_param('ss', $username, SHA1("$password"));
          $stmt->execute();
          $stmt->bind_result($username, $password);
          $stmt->store_result();

          if($stmt->num_rows == 1)  //To check if the row exists
              {

                $stmt2 = $con->prepare("SELECT AccountType FROM Type_Of_Accout WHERE username=? LIMIT 1");
                $stmt2->bind_param('s', $username);
                $stmt2->execute();
                $stmt2->bind_result($acc);
                $result = $stmt2->fetch();


                if($acc=='C'){
                    $stmt->close();
                    $stmt2->close();

                    //find customer id
                    $stmt3 = $con->prepare("SELECT idCustomer from customer where cu_userName=?");
                    $stmt3->bind_param('s', $username);
                    $stmt3->execute();
                    $stmt3->bind_result($id);
                    $result = $stmt3->fetch();

                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['id']=$id;
                    $stmt3->close();
                    $con->close();

                    header("Location: index.php");
                    exit;
              }
                elseif($acc=="A") {
                    $stmt->close();
                    $stmt2->close();

                    //find customer id
                    $stmt3 = $con->prepare("SELECT idAdmin from Admin where ad_userName=?");
                    $stmt3->bind_param('s', $username);
                    $stmt3->execute();
                    $stmt3->bind_result($id);
                    $result = $stmt3->fetch();

                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['id']=$id;
                    $stmt3->close();
                    $con->close();

                    header("Location: adminDashboard.php");
                    exit;
                }

              }
              else {
                  $stmt->close();
                  //echo "<script type='text/javascript'>alert('please check username and password');</script>";
                  echo '<p class="error"> *Please check username and password</p>';
              }
        }
        else{
          echo '<p class="error"> ';
          foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
          }
          echo '</p>';
        }
  }
?>
