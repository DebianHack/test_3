<?php

// Данные для подключения к БД
$server = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

// подключения к БД "chat"
$connect = mysqli_connect($server, $username, $password, $dbname);
// кодировка БД
mysqli_set_charset($connect, "utf8");

?>