<?php
$host = "localhost";
$user = "OWNER";
$password = "2222";
$db_name = "ground_plot";
$db = mysqli_connect($host,$user,$password,$db_name) or die(mysqli_error());
mysqli_set_charset ($db,"utf8");
?>
