<?php
include ('IN_OWNER.php');




$cod = $_POST['cod1'];



	$result1 = mysqli_query($db,"SELECT id_description FROM plot WHERE id_owner = $cod");
	
		
	while ($line1 = mysqli_fetch_array($result1)){
	$a =  $line1['id_description'];
	}
	
	$result2 = mysqli_query($db,"SELECT id_address FROM plot WHERE id_owner = $cod");
	
		
	while ($line2 = mysqli_fetch_array($result2)){
	$b =  $line2['id_address'];
	}
	
	mysqli_query($db,"CALL delete_plot( '$cod' )");

	mysqli_query($db,"CALL delete_owner( '$cod' )");
	
	mysqli_query($db,"CALL delete_address( '$b' )");
	
	mysqli_query($db,"CALL delete_description( '$a' )");
	
?>