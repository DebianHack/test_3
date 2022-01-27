<?php

include "config/db.php";
include "config/settings.php";
/*
1. Создать таблицу для друзей
2. Сделать ссылку на добавление в друзья - 
3. Сделать страницу обработчик где добавляем в БД выбранного пользователя
4. Перенаправляем пользователя на главную страницу
*/



if(isset($_GET["user_id"]))
{

$sql = "INSERT INTO friends (user_1, user_2) VALUES('".  $polzovatel_id  ."' , '".  $_GET["user_id"]  ."')";

if(mysqli_query($connect,$sql))
{
	include "modules/friend_list.php";
}
else
{
	echo "<h2>Ошибка</h2>";
}


}
?>