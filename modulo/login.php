<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <title>Login</title>
</head>



<body>
<div class="container-fluid px-0 overflow-x-hidden">
      <div class="row gx-0 min-vh-100">
        <div class="col-md-7 col-lg-6 col-xl-4  d-flex align-items-center shadow">
          <div class="w-100 py-5">
            <div class="text-center"><img class="img-fluid mb-4" src="../img/logo.png" alt="..." style="max-width: 6rem;">
              <h1 class="h4 text-uppercase mb-5">Inicio de sesion</h1>
            </div>
            <form  method="post" action="">
            <div class="bg-white p-5 rounded-5" style="width: 35rem;">
            <!--Mostrar el aviso de error al iniciar sesion-->
                <?php
                include("../config/conexion_bd.php");
                include("../config/controlador.php");
                ?>
              <!--Parte de ingresar correo electrónico-->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Correo Electrónico</label>
                    <input type="email" class="form-control" id="usuario" aria-describedby="emailHelp" name="correo">
                </div>
              <!--Parte de ingresar la contraseña-->  
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="password">
                </div>
                <!--Boton de inicio de sesion-->
                    <button name="btningresar" type="submit" class="btn btn-outline-primary" value="INICIAR SESION">Iniciar Sesion</button>
            </div>
          </form>   
          </div>
        </div>
        <div class="col-md-3 col-lg-6 col-xl-8 d-none d-md-block">
          <!-- Imagen de Fondo -->
          <div class="imagen bg-cover h-100 me-n3" style="background-image: url(../img/reunion.png); background-size: cover;
  background-repeat:no-repeat; background-position: center center;" ></div>
        </div>
      </div>
    </div>
</body>

</html>