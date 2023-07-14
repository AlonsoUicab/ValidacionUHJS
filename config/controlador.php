<?php
//metodo para entrar a sesion
if(!empty($_POST["btningresar"])){
    if(!empty($_POST["correo"] and !empty($_POST["password"]))){
        $usuario=$_POST["correo"];
        $password=$_POST["password"];
        session_start();
        $_SESSION['correo'] = $usuario;
        $sql=$conexion->query(" select * from usuario where correo='$usuario' and password='$password' ");
        if ($datos=$sql->fetch_object()) {
            header("location: ../index.php");
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }
        
    } else{
        echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
    }
}

?>