<!DOCTYPE HTML>
<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="STYLEA.css">
<TITLE>
</TITLE>
<script src="jquery-2.2.3.min.js"></script>
<script>
$(document).ready(function () {
		$("#done").bind("click", function () {
		var cod = form.cod.value;
		var price = form.price.value;
		var pricerent = form.pricerent.value;
		
		var fail = false;
		if (cod == "" || cod == " ")
			fail = "Вы не указали ваше имя";
		else if (price == "" || price == " ")
			fail = "Вы не указали вашу фамилию";
		else if (pricerent == "" || pricerent == " ")
			fail = "Вы не указали ваш телефон";
		
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "INSERT_ADMIN.php",
			type: "POST",
			data: ({cod: $("#cod").val(), price: $("#price").val(), pricerent: $("#pricerent").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Оценка принят");
					
				
			}
	
});
	});

	
	
});

</script>
</HEAD>


<div align="center">
<h1>Свободные участки</h1>
<table border="1" cellspacing="0" align="center">
<tr>
<th>Код
</th>
<th>Описание
</th>
<th>Площадь
</th>
<th>Имя владельца
</th>
<th>Телефон владельца
</th>
<th>Стоимость
</th>
<th>Аренда
</th>
</tr>	

 <?php 
 include ('IN_ADMIN.php');
 $type = mysqli_query($db, "SELECT * FROM information_view WHERE status_plot = 'NO' ");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr><td>'.$line['id_plot'].'</td><td>'.$line['about'].'</td><td>'.$line['area'].'</td><td>'.$line['name_owner'].'</td><td>'.$line['phone_owner'].'</td><td>'.$line['price'].'</td><td>'.$line['price_rent'].'</td></tr>';
    }
  ?>

</table>



</div>


<form name = "form" id= "form" align="center" >
<h1>Оценка участка</h1>
<p>Укажите код участка:</P> 
<input type="text" name="cod" id="cod" > <br>
<p>Укажите стоимость участка:</p> 
<input type="text" name="price" id="price" > <br>
<p>Укажите аренду участка:</p> 
<input type="text" name="pricerent" id="pricerent" > <br>

<input type="button" name="done" value="Оценить" id="done">  

</form>
<div align="center">
<h1>Все участки</h1>
<table border="1" cellspacing="0" align="center">
<tr>
<th>Код
</th>
<th>Описание
</th>
<th>Площадь
</th>
<th>Имя владельца
</th>
<th>Телефон владельца
</th>
<th>Стоимость
</th>
<th>Аренда
</th>
</tr>	

 <?php 
 include ('IN_ADMIN.php');
 $type = mysqli_query($db, "SELECT * FROM information_view ");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr><td>'.$line['id_plot'].'</td><td>'.$line['about'].'</td><td>'.$line['area'].'</td><td>'.$line['name_owner'].'</td><td>'.$line['phone_owner'].'</td><td>'.$line['price'].'</td><td>'.$line['price_rent'].'</td></tr>';
    }
  ?>

</table>



</div>



</BODY>
</HTML>