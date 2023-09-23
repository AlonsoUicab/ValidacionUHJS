<?php

require '../config/conexion_bd.php';

//Valores para guardar los datos del modal en la tabla Persona
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];
$curso = $_POST['idProgramas'];

//Consulta a la base de datos para insertar datos
    $QueryInsert = ("INSERT INTO persona(
        nombre,
        apellidoPaterno,
        apellidoMaterno,
        correo,
        rol,
        idProgramas
        )
        VALUES (
            '".$nombre."',
            '".$apellidoPaterno."',
            '".$apellidoMaterno."',
            '".$correo."',
            '".$rol."',
            '".$curso."'
            )");
            $Insert = mysqli_query($conexion, $QueryInsert);

header('Location: ../index.php');

?>