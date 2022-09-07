<?php
include ('IN_OWNER.php');




$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$address = $_POST['address']; 
$email = $_POST['email'];
$about  = $_POST['about'];
$area = $_POST['area'];
$number = $_POST['number'];
$adress = $_POST['adress'];
$city = $_POST['city'];

	
	
	mysqli_query($db,"CALL add_owner('$name', '$surname', '$phone' , '$address', '$email')");
	mysqli_query($db,"CALL add_address('$adress', '$city')");
	mysqli_query($db,"CALL add_description('$area', '$number', '$about')");
	$result1 = mysqli_query($db, "SELECT id_owner FROM owner  WHERE email_owner = '$email'");
	
	while ($line1 = mysqli_fetch_array($result1)){
	$a =  $line1['id_owner'];
	}
	
	$result2 = mysqli_query($db, "SELECT id_description FROM description  WHERE num_bud = '$number'");

	while ($line2 = mysqli_fetch_array($result2)){
	$b =  $line2['id_description'];
	}
	
	$result3 = mysqli_query($db, "SELECT id_address FROM adress  WHERE address= '$adress'");

	while ($line3 = mysqli_fetch_array($result3)){
	$c =  $line3['id_address'];
	}
	
	
	
	
	mysqli_query($db,"UPDATE plot SET  id_description = $b, id_address = $c WHERE id_owner = $a");
	
	
	
?>