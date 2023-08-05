<?php

include 'config/conexion_bd.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
    <link rel="stylesheet" href="assets/css/prueba.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <section class="Primero">
        <section class="navigation">
            <header style="border-bottom: 2px solid rgba(255,255,255);">
            <nav class="navbar navbar-expand-lg shadow-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href=""><img src="img/LogoUHJS.png" alt="" style="height: 7rem;" class="perfil"> </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav mt-4">
                        <li class="nav-item">
                            <!--Aqui se podra cerrar la session del programa-->
                        <a href="" class="btn btn-secondary me-5 mb-3" >Inicio</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>
            </header>
        </section>
        <div class="col-auto p-5 text-center">
            <div class="w-50 row justify-content-center m-auto">
                <p class="texto">El presente portal te permite validar y consultar el contenido de las constancias emitidas por la UHJS
                                en cualquiera de sus Oficinas Registrales.</p>
            </div>
            <div class="bajar">
                <a href="#tablas" class="btn btn-lg btn-margin-righ btn-info">Consultar/Validacion Constancia</a>
            </div>
        </div>
    </section>
    <section class="tablas" id="tablas">
    <div class="container">
        <div class="col-auto p-5 text-center" >
            <div class="w-50 row justify-content-center m-auto">
                    <h3>Consulta/Validación Constancia</h3>
                    <p class="texto">Para consultar/validar una constancia deberá ingresar el folio de la constancia.</p>
                    <form action="" method="get" class="search-bar">
                        <input class="" type="text" placeholder="Ingresar Folio..." name="busqueda">
                        <button type="submit" name="enviar" value=""><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form> 
                </div>
        </div>
        </div>
        <?php

    if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'] - 100000;
        $buscar =("SELECT * from persona
                    INNER JOIN programas ON persona.idProgramas = programas.idProgramas WHERE idPersona LIKE '%$busqueda%'");
        $consulta = mysqli_query($conexion, $buscar);
        if($row = $consulta->fetch_array()){
            $fechaInicio = $row['fechaInicio'];
            $inicioCambio= date("d/m/y", strtotime($fechaInicio));
            $fechaFin = $row['fechaFin'];
            $finCambio = date("d/m/y", strtotime($fechaFin));
    ?>
    <div class="table-responsive scrollbar">
        <table class="table table-bordered border-white" id="myTable">
        <thead class="table-dark bg-200 text-900">
                        <!--Encabezados y los titulos de cada columna de la tabla-->
                        <tr class="mt">
                            <th class="sort" style="text-align: center;" data-sort="id">Folio</th>
                            <th class="sort" style="text-align: center;" data-sort="nombre">Nombre(s)</th>
                            <th class="sort" style="text-align: center;" data-sort="apellidoPaterno">Apellido Paterno</th>
                            <th class="sort" style="text-align: center;" data-sort="apellidoMaterno">Apellido Materno</th>
                            <th class="sort" style="text-align: center;" data-sort="programa">Curso</th>
                            <th class="sort" style="text-align: center;" data-sort="duracion">Duracion</th>
                            <th class="sort" style="text-align: center;" data-sort="fechaInicio">Fecha Inicio</th>
                            <th class="sort" style="text-align: center;" data-sort="fechaFin">Fecha Fin</th>
                            <th class="sort" style="text-align: center;" data-sort="acciones">PDF</th>
                        </tr>
                        </thead>
                        <tbody class="table-secondary">
                        <tr>
                            <td class="dato" align="center" data-sort="id"><?php echo $row['idPersona'] + 100000 ?></td>
                            <td class="dato" data-sort="nombre"><?php echo ucwords($row['nombre']) ?></td>
                            <td class="dato" data-sort="apellidoPaterno"><?php echo ucwords($row['apellidoPaterno']) ?></td>
                            <td class="dato" data-sort="apellidoMaterno"><?php echo ucwords($row['apellidoMaterno']) ?></td>
                            <td class="dato" align="center" data-sort="nombrePrograma"><?php echo ucfirst($row['nombrePrograma']) ?></td>
                            <td class="dato" align="center" data-sort="duracion"><?php echo $row['duracion']." Horas" ?></td>
                            <td class="dato" align="center" data-sort="fechaInicio"><?php echo $inicioCambio ?></td>
                            <td class="dato" align="center" data-sort="fechaFin"><?php echo $finCambio ?></td> 
                            <td class="dato" align="center" data-sort="acciones">
                                <a href="libreria/Certificado.php?idPersona= <?php echo $row['idPersona'] ?>" class="btn btn-sm btn-outline-danger" target="_blank">
                                    <i class="fa-sharp fa-solid fa-file-pdf"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
    </div>
                        <?php
                        }else{
                            ?>
                            <div class="col-auto p-5 text-center">
                                <div class="w-50 row justify-content-center m-auto">
                                    <div class="alert alert-danger "><i class="fa-solid fa-xmark fa-beat"></i> No se encontró el folio</div>
                                </div>
                            </div>
                            <?php
                        }
                    }   
                        ?>
    </section>
</body>
</html>