<?php
//variables para conectar la base de datos
$localhost= "localhost";
$user="root";
$clave="";
$bd="login";
$puerto="3306";

//conexion a la base de datos 
$conexion = new mysqli($localhost, $user, $clave, $bd,$puerto);
$conexion->set_charset("utf8");


?>