<?php
$mysql = new mysqli('127.0.0.1' , 'pma' , '' , 'lab2_bd');

if ($mysql->connect_errno) {
    printf("Соединение не удалось: %s\n", $mysql->connect_error);
    exit();
}
?>
