<?php
require_once('mysqli_connect.php');
function add_quote($new_text){
    $conn = db_connect();
    // Prepare the values for storing:
    $quote = mysqli_real_escape_string($conn, trim(strip_tags($_POST['new_qt'])));
    $stmt = $conn->prepare ("INSERT INTO quotes (username,quote) VALUES (?,?)");
    $stmt->bind_param("ss", $valid_user, $quote);
    $stmt->execute();
        if (mysqli_affected_rows($conn) == 1){
             print '<p>Your quotation has been stored.</p>';
          } else {
             print '<p>Could not store the quote.</p>';
          }
 }
function get_user_qts($username) {
    $conn = db_connect();
    $result = $conn->query("select quote,id
                          from quotes
                          where username = '$username'");
        if (!$result) {
            return false;
        }
    while ($row = mysqli_fetch_array($result)) {
       // Print the record:
        print "<div><blockquote>{$row['quote']}</blockquote>\n";
        print "<a href=\"delete_qts.php?id={$row['id']}\">Delete</a>\n";
     }
}
function delete_qt($id) {
       $conn = db_connect();
        if (!$conn->query("delete from quotes where
                     id='$id'")) {
            throw new Exception('Bookmark could not be deleted');
        }
        return true;
}
?>
