<?php
function do_html_header($title) {
  // print an HTML header
?>
<!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc;}
      a { color: #000 }
      div.formblock
         { background: #ccc; width: 300px; padding: 6px; border: 1px solid #000;}
    </style>
  </head>
  <body>
  <hr />
<?php
}
function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <br><a href="<?php echo $url;?>"><?php echo $name;?></a><br>
<?php
}

function display_user_menu() {
  // display the menu options on this page
?>
<hr>
<a href="member.php">Home</a> &nbsp;|&nbsp;
<a href="add_quote_form.php">Add quote</a> &nbsp;|&nbsp;
<a href="logout.php">Logout</a>
<hr>

<?php
}
function display_add_quote_form() {
?>
<form name="qt_table" action="add_quote.php" method="post">
 <div class="formblock">
    <h2>New quote</h2>
    <p>
    <input type="text" name="new_qt" id="new_qt"
     size="35"  maxlength="200" required /></p>
    <button type="submit">Add Quote</button>
   </div>
</form>
<?php
}
