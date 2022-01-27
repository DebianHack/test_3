<?php
include "../config/db.php";


/*
Отправка сообщения пользователя, который авторизовался

*/
if(isset($_POST["submit"]) )
{

	if(isset($_COOKIE["polzovatel_id"]) )
	{
	$sql = "INSERT INTO messages ( user_id_to, ot_user_to, message ) 
	VALUES ('". $_POST["user_id_to"] . "'  ,  '". $_POST["ot_user_to"] . "',' ". $_POST["text"] ." ')";
	
	}
	// echo "<h2>var_dump($sql)</h2>";
	mysqli_query($connect, $sql);

}

$send_polzovatel_id = $_POST["user_id_to"];
$polzovatel_id = $_POST["ot_user_to"];
include "messages.php";

?>