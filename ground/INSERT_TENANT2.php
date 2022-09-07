<?php
include ('IN_ADMIN.php');




$cod = $_POST['cod2'];
$status = 'NO';


	
	
	$result1 = mysqli_query($db,"SELECT id_description FROM plot WHERE id_tenant = $cod");
	
	while ($line1 = mysqli_fetch_array($result1)){
	$a =  $line1['id_description'];
	}
	
	
	mysqli_query($db,"CALL update_status ('$a', '$status')");
	
	
	mysqli_query($db,"CALL delete_tenant ('$cod')")
?>