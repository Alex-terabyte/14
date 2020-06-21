<?php
  session_start();

  require "scripts.php";

  if (!isset($_SESSION['username']))
  {
	exit("Authorization <a href='index.html'> required</a>");
  }

  $login = $_SESSION['username'];
  $old_password = valid_input($_POST['oldpassword']);
  $password = valid_input($_POST['password']);
  $password2 = valid_input($_POST['password2']);
  chek_pass($password,$password2);
if(chek_autorisation($_SESSION['username'],$old_password) && chek_pass($password,$password2))
{
  $db = new mysqli('localhost', 'root', '', 'mydb');

  $db->query("UPDATE `users` SET `password` =  '$password' where `login`= '$login'");
  echo "password changed<br>";
  echo "<a href='main.php'>To the main menu</a>";
}
else
{
  echo "Invalid password entered<br>";
  include "repass.html";
}


  function chek_pass($password, $password2)
  {
    $valid = false;
    if (!valid_regexp($password))
    {
      echo "Invalid password!<br>";
      include "repass.html";
      $valid = false;
    }
    else if ($password != $password2)
    {
      echo "Password mismatch!<br>";
      include "repass.html";
      $valid = false;
    }
    else
    {
      $valid = true;
    }
    return $valid;
  }
?>
