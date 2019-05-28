  <?php
  require_once('quote_fns.php');
  $conn = db_connect();
  $result = $conn->query("select quote
                          from quotes
                          ORDER BY RAND() DESC LIMIT 1");
  if (!$result) {
    return false;
    }
  $row = mysqli_fetch_array($result);
  print "<p>Random quote :</p><blockquote>{$row['quote']}</blockquote>\n";
  ?>

  <p><a href="register_form.php">Not a member?</a></p>
    <form method="post" action="member.php">
      <div class="formblock">
      <h2>Members Log In Here</h2>
        <p><label for="username">Username:</label><br/>
          <input type="text" name="username" id="username" /></p>
            <p><label for="passwd">Password:</label><br/>
              <input type="password" name="passwd" id="passwd" /></p>
                <button type="submit">Log In</button>
        </div>
     </form>
