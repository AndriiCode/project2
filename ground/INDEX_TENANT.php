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
		var name = form.name.value;
		var surname = form.surname.value;
		var phone = form.phone.value;
		var address = form.address.value;
		var email = form.email.value;
		var fail = false;
		if (name == "" || name == " ")
			fail = "Вы не указали ваше имя";
		else if (surname == "" || surname == " ")
			fail = "Вы не указали вашу фамилию";
		else if (phone == "" || phone == " ")
			fail = "Вы не указали ваш телефон";
		else if (address == "" || address == " ")
			fail = "Вы не указали ваш адресс";
		else if (email == "" || email == " ")
			fail = "Вы не указали ваш email";
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "INSERT_TENANT.php",
			type: "POST",
			data: ({name: $("#name").val(), surname: $("#surname").val(), phone: $("#phone").val(), address: $("#address").val(), email: $("#email").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Пользователь добавлен");
					
				
			}
	
});
	});
	$("#done1").bind("click", function () {
	
		var cod = form1.cod.value;
		var answer = form1.answer.value;
		var plot = form1.plot.value;
		var fail = false;
		if (cod == "" || cod == " ")
			fail = "Вы не указали код";
		
		
	if (fail)
alert(fail);
else 
	
		$.ajax ({
			url: "INSERT_TENANT1.php",
			type: "POST",
			data: ({cod: $("#cod").val(), answer: $("#answer").val(), plot: $("#plot").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Участок успешно оформлен");
					
				
			}		
	});
	
});

	$("#done2").bind("click", function () {
	
		var cod2 = form2.cod2.value;
				var fail = false;
		if (cod2 == "" || cod2 == " ")
			fail = "Вы не указали код";
		
	if (fail)
alert(fail);
else 
	if(confirm("Вы уверены?")){
		$.ajax ({
			url: "INSERT_TENANT2.php",
			type: "POST",
			data: ({cod2: $("#cod2").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Удаление завершено");
					
				
			}		
	});}
	else
		alert("отмена");
});
	
});

</script>
</HEAD>


<div align="center">
<h1>Пользователи</h1>
<table border="1" cellspacing="0" align="center">
<tr>
<th>Код
</th>
<th>Имя
</th>
<th>Фамилия
</th>

</tr>	

 <?php 
 include ('IN_TENANT.php');
 $type = mysqli_query($db, "SELECT * FROM tenant_view ");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr><td>'.$line['id_tenant'].'</td><td>'.$line['name_tenant'].'</td><td>'.$line['surname_tenant'].'</td>';
    }
  ?>

</table>



</div>


<form name = "form" id= "form" align="center" >
<h1>Регистрация</h1>
<p>Укажите ваше имя:</P> 
<input type="text" name="name" id="name" placeholder="Ваше имя"> <br>
<p>Укажите вашу фамилию:</p> 
<input type="text" name="surname" id="surname" placeholder="Ваша фамилия"> <br>
<p>Укажите ваш телефон:</p> 
<input type="text" name="phone" id="phone" placeholder="Ваш телефон"> <br>
<p>Укажите ваш адресс:</p> 
<input type="text" name="address" id="address" placeholder="Ваш адресс"> <br>
<p>Укажите ваш email:</p> 
<input type="text" name="email" id="email" placeholder="Ваш email"> <br>

<input type="button" name="done" value="Добавить" id="done">  

</form>
<div align="center">
<h1>Участки</h1>
<table border="1" cellspacing="0" align="center">
<tr>
<th>Описание
</th>
<th>Площадь
</th>
<th>Адресс
</th>
<th>Город
</th>
<th>Стоимость
</th>
<th>Аренда
</th>
<th>Имя заказчика
</th>
<th>Фамилия заказчика
</th>
<th>Тип заказа
</th>
</tr>	

 <?php 
 include ('IN_TENANT.php');
 $type = mysqli_query($db, "SELECT * FROM a_view  ");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr><td>'.$line['about'].'</td><td>'.$line['area'].'</td><td>'.$line['address'].'</td><td>'.$line['city'].'</td><td>'.$line['price'].'</td><td>'.$line['price_rent'].'</td><td>'.$line['name_tenant'].'</td><td>'.$line['surname_tenant'].'</td><td>'.$line['type'].'</td></tr>';
    }
  ?>

</table>




<form name = "form1" id= "form1" align="center" >
<h1>Выбор участка</h1>
<p>Укажите ваш код:</P> 
<input type="text" name="cod" id="cod" placeholder="Ваш код"> <br>
<p>Выберите покупка/оренда ?</p>
  <p><select name="answer" size="1" id="answer">
  <option value="Покупка">Покупка
  <option value="Аренда">Аренда
  </select>
  </p>
 
  <p>Выберите участок</p>
  <select name="plot" size="1" id="plot">
   <?php 
 include ('IN_TENANT.php');
 $type = mysqli_query($db, "SELECT * FROM plot_view WHERE status_plot = 'NO' ");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['id_description'].'">'.$line['about']." "."площадь: ".$line['area']." "."Имя владельца: ".$line['name_owner']." "."Телефон: ".$line['phone_owner'].'';
    }
  ?>
  </select>
  <br>
  <input type="button" name="done1" value="Выбрать" id="done1">  
</form>
<form name = "form2" id= "form2" align="center" >

<h1>Форма удаления заказчика</h1>
<p>Укажите код заказчика:</P> 
<input type="text" name="cod2" id="cod2" placeholder="Код"> <br>

  <br>
<input type="button" name="done2" value="Удалить" id="done2">  

</form>

</BODY>
</HTML>