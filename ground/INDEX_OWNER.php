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
		var about = form.about.value;
		var area = form.area.value;
		var number = form.number.value;
		var adress = form.adress.value;
		var city = form.city.value;
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
		else if (about == "" || about == " ")
			fail = "Вы не указали описание";
		else if (area == "" || area == " ")
			fail = "Вы не указали площадь";
		else if (number == "" || number == " ")
			fail = "Вы не указали номер";
		else if (adress == "" || adress == " ")
			fail = "Вы не указали адресс участка";
		else if (city == "" || city == " ")
			fail = "Вы не указали город";
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "INSERT_OWNER.php",
			type: "POST",
			data: ({name: $("#name").val(), surname: $("#surname").val(), phone: $("#phone").val(), address: $("#address").val(), email: $("#email").val(), about: $("#about").val(), area: $("#area").val(), number: $("#number").val(), adress: $("#adress").val(), city: $("#city").val(),}),
			dataType: "html",
			
			success: function (data){
					alert("Участок добавлен");
					
				
			}
	
});
	});

	$("#done1").bind("click", function () {
	
		var cod1 = form1.cod1.value;
				var fail = false;
		if (cod1 == "" || cod1 == " ")
			fail = "Вы не указали код";
		
	if (fail)
alert(fail);
else 
	if(confirm("При удалении арендодателя, удалится участок, вы уверены?")){
		$.ajax ({
			url: "INSERT_OWNER1.php",
			type: "POST",
			data: ({cod1: $("#cod1").val()}),
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

<BODY>
<form name = "form" id= "form" align="center" >
<h1>Ваша информация</h1>
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
<h1>Информация про участок</h1>
<p>Описание:</P> 
<input type="text" name="about" id="about"> <br>
<p>Площадь:</P> 
<input type="number" name="area" id="area"> <br>
<p>Номер:</P> 
<input type="number" name="number" id="number"> <br>
<p>Адресс:</P> 
<input type="text" name="adress" id="adress"> <br>
<p>Город:</P> 
<input type="text" name="city" id="city"> <br>

<input type="button" name="done" value="Добавить" id="done">  

</form>

<div align="center">
<h1>Арендодатели</h1>
<table border="1" cellspacing="0" align="center">
<tr>
<th>Код
</th>
<th>Имя
</th>
<th>Фамилия
</th>
<th>Описание
</th>
<th>Адресс
</th>
<th>Город
</th>
</tr>	

 <?php 
 include ('IN_OWNER.php');
 $type = mysqli_query($db, "SELECT * FROM owner_view ");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr><td>'.$line['id_owner'].'</td><td>'.$line['name_owner'].'</td><td>'.$line['surname_owner'].'</td><td>'.$line['about'].'</td><td>'.$line['address'].'</td><td>'.$line['city'].'</td></tr>';
    }
  ?>

</table>



</div>

<form name = "form1" id= "form1" align="center" >

<h1>Форма удаления арендодателя</h1>
<p>Укажите код арендодателя:</P> 
<input type="text" name="cod1" id="cod1" placeholder="Код"> <br>

  <br>
<input type="button" name="done1" value="Удалить" id="done1">  

</form>



</BODY>
</HTML>