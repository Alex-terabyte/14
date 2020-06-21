<?php
require "scripts.php";

$login = valid_input($_POST['user']);
$sum = valid_input($_POST['balance']);

$db = new mysqli('localhost', 'root', '', 'mydb');

$db->query("UPDATE `users` SET `balance` =  $sum where `login`= '$login'");
include "admin.php";

?>
