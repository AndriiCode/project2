<?php
include ('IN_TENANT.php');




$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$address = $_POST['address']; 
$email = $_POST['email'];

	
	
	mysqli_query($db,"CALL add_tenant('$name', '$surname', '$phone' , '$address', '$email')");
	
	
	
?>