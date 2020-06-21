<?php
require "scripts.php";

$login = valid_input($_POST['login']);
$password = valid_input($_POST['password']);

if (!valid_regexp($login) || !valid_regexp($password))
{
  echo "Login or password is incorrectly entered.<br>";
  include "index.html";
}
else
{
    if (chek_autorisation($login,$password))
  {
    echo "Login successful.<br>";
	echo "<a href='main.php'>Proceed</a>";
    session_start();
    $_SESSION['username'] = $login;
  }
  else
  {
    echo "The username or password you entered is incorrect.<br>";
    include "index.html";
  }
}
?>
