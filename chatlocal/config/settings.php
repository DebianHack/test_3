<?php
/*
Файл для настроек сайта
*/



// Название сайта
$nameSite = "ВебЧат";

$polzovatel_id = null;

if(isset($_COOKIE["polzovatel_id"]))
{
	$polzovatel_id = $_COOKIE["polzovatel_id"];
}
?>