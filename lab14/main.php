<?php
 session_start();
if (!isset($_SESSION['username']))
{
    exit("Authorization <a href='index.html'> required</a>");
}
require "scripts.php";

if (!isset($_SESSION['username']))
{
   exit("Authorization <a href='index.html'> required</a>");
}

echo "Hello!, " . $_SESSION['username'] . "<br>";

echo "On your account:" . balance($_SESSION['username']) . " $.<br>";
?>

<a href='send_form.php'>Transfer to another user</a><br>
<a href='repass.html'>Change password</a><br>
<a href='exit.php'>Output</a><br>
<a href='delete.php'>Delete account</a>
