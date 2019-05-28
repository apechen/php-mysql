<?php
// include function files for this application
require_once('quote_fns.php');
session_start();
do_html_header('Add Quotes');
check_valid_user();
?>
<form name="qt_table" action="add_quote.php" method="post">
  <div class="formblock">
    <h2>New quote</h2>
    <p>
    <input type="text" name="new_qt" id="new_qt" 
     size="35"  maxlength="200" required />
     </p>
      <button type="submit">Add Quote</button>
   </div>
</form>
<?php
display_user_menu();
?>