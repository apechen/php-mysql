<?php
// include function files for this application
require_once('quote_fns.php');
session_start();
$username = $_POST['username'];
$passwd = $_POST['passwd'];
if ($username && $passwd) {
// they have just tried logging in
  try  {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Problem:');
    echo 'You could not be logged in.<br>
          You must be logged in to view this page.';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
  }
}
do_html_header('Home');
check_valid_user();
// get the quotes this user has saved
get_user_qts($_SESSION['valid_user']);
// give menu of options
display_user_menu();
?>
