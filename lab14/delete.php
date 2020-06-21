<?php
  session_start();
  if (!isset($_SESSION['username']))
  {
    exit("Authorization <a href='index.html'> required</a>");
  }

  $login = $_SESSION['username'];

  $db = new mysqli('localhost', 'root', '','mydb');
  $db->query("DELETE FROM `users` where `login` = '$login'");
  session_destroy();
  echo "User deleted";
?>
<br>
<a href='index.html'>entrance</a><br>
<a href='reg_form.html'>check in</a>
