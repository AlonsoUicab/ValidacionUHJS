<?php

require '../config/conexion_bd.php';

//Valores para guardar los datos del modal en la tabla Persona
$idPersona = $_POST['idPersona'];
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];
$curso = $_POST['idProgramas'];

//Consulta a la base de datos para insertar datos
    $QueryUpdate = ("UPDATE persona SET nombre = '$nombre', apellidoPaterno = '$apellidoPaterno', apellidoMaterno = '$apellidoMaterno',
                    correo = '$correo', rol = '$rol', idProgramas = $curso WHERE idPersona = $idPersona");
            $Insert = mysqli_query($conexion, $QueryUpdate);

header('Location: ../index.php');

?>