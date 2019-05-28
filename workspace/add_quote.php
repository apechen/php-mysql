<?php
require_once('quote_fns.php');
session_start();
$new_text = $_POST['new_qt'];
do_html_header('Adding quotes');
try {
    check_valid_user();
    if (!filled_out($_POST)) {
      throw new Exception('Form not completely filled out.');
    }
    add_quote($new_text);
    echo 'Quote added.';
}catch (Exception $e) {
    echo $e->getMessage();
  }
  display_user_menu();
?>
