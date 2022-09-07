<?php
include ('IN_ADMIN.php');




$cod = $_POST['cod'];
$price = $_POST['price']." грн";
$pricerent = $_POST['pricerent']." грн/мес";


	
	
	mysqli_query($db,"CALL update_plot('$price', '$pricerent', '$cod' )");
	
	
	
?>