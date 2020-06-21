<?php
session_start();

require "scripts.php";

if (!isset($_SESSION['username']))
{
  exit("Authorization <a href='index.html'> required</a>");
}
$sender = valid_input($_SESSION['username']);
$receiver = valid_input($_POST['receiver']);
$sum = $_POST['sum'];

$db = new mysqli('localhost', 'root', '', 'mydb');

$s = "SELECT * FROM `users` WHERE `login` = '" . $sender . "'";
$result=$db->query($s);
$record = $result->fetch_assoc();
$max_sum = $record['balance'];

if ($sum <= 0)
{
  echo "Amount of transfer must be positive<br>";
  include "send_form.php";
}
else if ($sum > $max_sum)
{
  echo "It is impossible to send more than you have!<br>";
  include "send_form.php";
}
else
{

$db->query("UPDATE `users` SET `balance` = `balance`- $sum where `login`= '$sender'");
$db->query("UPDATE `users` SET `balance` = `balance`+ $sum where `login`= '$receiver'");
echo "<a href='main.php'>To the main menu</a>";
}
?>
