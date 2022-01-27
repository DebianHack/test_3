<?php
include "config/db.php";

/*

1. Дизаин/мокап - done
2. Сделать отправку формы - done
3. Сделать обработку данных формы, проверить заполнили ли email, password - готово
4. Сделать проверку, если ли такой пользователь в БД
5. Если нет, то вывести ошибку, иначе пункт 6 
6. Авторизовать пользователя

*/
// setcookie("polzovatel_id", "", 0);
if(
	isset($_POST["email"]) && isset($_POST["password"])
	&& $_POST["email"] != "" && $_POST["password"] != ""
)
	{
		
		$sql = "SELECT * FROM polzovateli WHERE email LIKE '".  $_POST["email"]  ."' AND password LIKE '".  $_POST["password"]  ."' ";
		$result = mysqli_query($connect, $sql);
		$col_polzovately = mysqli_num_rows($result);
		

		if($col_polzovately == 1)
		{
			$polzovatel = mysqli_fetch_assoc($result);
			// Создаем куки для хранения данных пользователя
			setcookie("polzovatel_id", $polzovatel["id"], time() +60*60);

			header("Location: /");
		}
		else
		{
			echo "<h2>Логин или пароль введены неправильно</h2>";
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php
	include "chast_site/shapka.php";
	?>

	<div id="content">
		<h2>Авторизация</h2>
	<form id="form2"action="login.php" method="POST">
		<p>
			Введите свой email:<br/>
		<input type="text" name="email">
		</p>

		<p>
			Введите свой пароль:<br/>
		<input type="password" name="password">
		</p>
		<p>
			<a href="registr.php">Регистрация</a>
		</p>
		<p>
			<button type="submit">Войти</button>
		</p>
		
	</form>
	
</div>

</body>
</html>