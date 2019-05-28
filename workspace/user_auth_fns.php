<?php
require_once('mysqli_connect.php');
function register($username, $password) {
  $conn = db_connect();
  // check if username is unique
    $result = $conn->query("select * from user where username='".$username."'");
        if (!$result) {
            throw new Exception('Could not execute query');
        }
        if ($result->num_rows>0) {
            throw new Exception('That username is taken - go back and choose another one.');
        }

  // if ok, put in db
    $stmt = $conn->prepare("insert into user ( username, passwd) values
                         (?,?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
        if (!$result) {
            throw new Exception('Could not register you in database - please try again later.');
        }
          return true;
}

function login($username, $password) {
    $conn = db_connect();
    $stmt = $conn->prepare("select * from user
                         where username=?
                         and passwd =?" );
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $stmt->bind_result( $username, $password);
    $stmt->store_result();
     if($stmt->num_rows == 1)  {
       return true;
    } else {
        throw new Exception('Could not log you in.');
        }
}

function check_valid_user() {
// see if somebody is logged in and notify them if not
  if (isset($_SESSION['valid_user']))  {
      echo "Logged in as ".$_SESSION['valid_user'].".<br>";
  } else {
     // they are not logged in
     do_html_header('Problem:');
     echo 'You are not logged in.<br>';
     do_html_url('login.php', 'Login');
     exit;
  }
}
?>
