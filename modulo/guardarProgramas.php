<?php

require '../config/conexion_bd.php';

//Valores para guardar los datos del modal en la tabla Programas
$nombrePrograma = $_POST['nombrePrograma'];
$categoria = $_POST['categoria'];
$duracion = $_POST['duracion'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];

//Consulta a la base de datos para guardar los datos en la tabla Programas

$QueryInsert = ("INSERT INTO programas(
                nombrePrograma,
                categoria,
                duracion,
                fechaInicio,
                fechaFin
                )
                VALUES (
                '".$nombrePrograma."',
                '".$categoria."',
                '".$duracion."',
                '".$fechaInicio."',
                '".$fechaFin."'
                )");
                
                $Insert = mysqli_query($conexion, $QueryInsert);

header('Location: ../index.php');

?>