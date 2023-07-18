<?php
include 'conexion_bd.php';
//metodo para entrar a sesion
if(!empty($_POST["btningresar"])){
    if(!empty($_POST["correo"] and !empty($_POST["password"]))){
        $usuario=$_POST["correo"];
        $password=$_POST["password"];
        session_start();
        $_SESSION['correo'] = $usuario;
        $sql=(" select * from usuario where correo='$usuario' and password='$password' ");
        $inicioSesion = mysqli_query($conexion, $sql);
        if ($datos=$inicioSesion->fetch_assoc()) {
            $nombre = $datos['nombre'];
            $apellido = $datos['apellidoPaterno'];
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $nombre." ".$apellido;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ;
            header("location: ../index.php");
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }
        
    } else{
        echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
    }
}

?>