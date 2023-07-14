<?php

require '../config/conexion_bd.php';

//Se requiere el id para poder solicitar los registros del alumno
$idPersona = $_POST['idPersona'];

$sql = "SELECT idPersona, nombre, apellidoPaterno, apellidoMaterno, correo, idProgramas FROM persona WHERE idPersona=$idPersona LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$Alumnos = [];

if($rows > 0){
    $Alumnos = $resultado->fetch_array();
}

echo json_encode($Alumnos, JSON_UNESCAPED_UNICODE);

?>