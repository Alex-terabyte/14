<?php
    session_start();
if (!isset($_SESSION['username']))
{
  exit("Необходима <a href='index.html'>авторизация</a>");
}
?>

Money transaction<br>
<form action="send.php" method="post"><br>
Recipient: <input name="receiver"><br>
Amount:<input name="sum"><br>
<input type="submit" value="Make a transfer">
</form>
<br>
<a href='main.php'>To the main menu</a>
