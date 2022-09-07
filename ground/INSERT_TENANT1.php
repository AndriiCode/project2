<?php
include ('IN_ADMIN.php');




$cod = $_POST['cod'];
$answer = $_POST['answer'];
$plot = $_POST['plot'];
$status = 'YES';


	
	
	mysqli_query($db,"CALL buy_plot ('$answer', '$cod')");
	mysqli_query($db,"UPDATE plot SET id_tenant = $cod WHERE id_description = $plot");
	mysqli_query($db,"CALL update_status ('$plot', '$status')");
	
?>