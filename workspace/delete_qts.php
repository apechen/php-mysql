<?php
  require_once('quote_fns.php');
  session_start();
  //create short variable names
  $valid_user = $_SESSION['valid_user'];
  $id =$_GET['id'];
  do_html_header('Deleting bookmarks');
  check_valid_user();
  delete_qt($id);
  print '<p>Your quotation has been deleted.</p>';
  display_user_menu();
  ?>
