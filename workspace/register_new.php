<?php
  // include function files for this application
  require_once('quote_fns.php');
  //create short variable names
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  try   {
    // check forms filled in
    if (!filled_out($_POST)) {
      throw new Exception('You have not filled the form out correctly - please go back and try again.');
    }
    // passwords not the same
    if ($passwd != $passwd2) {
      throw new Exception('The passwords you entered do not match - please go back and try again.');
    }
    // check password length is ok
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
      throw new Exception('Your password must be between 6 and 16 characters. Please go back and try again.');
    }
    // attempt to register
    register($username, $passwd);
    // register session variable
    $_SESSION['valid_user'] = $username;
    // provide link to members page
    do_html_header('Registration successful');
    echo 'Your registration was successful.  Go to the members page to start setting up your bookmarks!';
    do_html_url('member.php', 'Go to members page');
    }
  catch (Exception $e) {
     do_html_header('Problem:');
     echo $e->getMessage();
     exit;
  }
?>
