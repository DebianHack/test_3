<?php
include "config/db.php";
include "config/settings.php";


if($polzovatel_id == null)
{
	header("Location: /login.php");
}


?>






<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nameSite; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php
	include "chast_site/shapka.php";
	?>
	

	<div id="content">
		

		<div id="users">

				<form  method="GET" id="poisk">
					<input type="text" name="poisk-text">

					<button type="search" name = "search"><img src="images/icon-search.png"></button>
				</form>
			
			<?php 

			// Пользователи
			include "modules/spisok.php";
			 ?>
		</div>


		<div id="soobsheya">
			
			<?php 
			// Сообщения
			  include "modules/messages.php";
			 ?>
			 <?php
			 if(isset($_GET["user"]))
			 {
			 	?>
			<form id="form" action="http://chat.local2/modules/add_sms.php"  method="POST" >
				<input type="hidden" name="user_id_to" value="<?php echo $_GET["user"]; ?>" >
				<input type="hidden" name="ot_user_to" value="<?php  echo $polzovatel_id; ?>" >
				<input type="hidden" name="User" >
				<textarea name="text"></textarea>
				<button type="submit" name="submit" ><img src="images/send.png"></button>
			</form> 

			 	<?php
			 }
			 ?>
			

	</div>
</div>
<!-- Модальное окно контактов -->
	<?php 
		include "modules/contacts.php ";
	?>

	
<!-- Модальное окно входа -->
	<div class="modal2" id="entry-modal">
		<div class="close2">X</div>
		<div class="content2">
			<li>
				<h1>Email или Телефон</h1>
					<div id="form2">
						<textarea></textarea>
					</div>
				
				<h2>Пароль</h2>
					<div id="form2">
						<textarea></textarea>
					</div>
			</li>
			
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>