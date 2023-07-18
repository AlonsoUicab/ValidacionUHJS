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
    <h1 class="texto">Validación de certificados o constancias</h1>
    <div class="container">
        <form action="" method="get" class="search-bar">
            <input type="text" placeholder="Ingresar Folio..." name="busqueda">
            <button type="submit" name="enviar" value=""><i class="fa-solid fa-magnifying-glass"></i></button>
        </form> 
        </div>
        <?php

    if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'] - 100000;
        $buscar =("SELECT * from persona
                    INNER JOIN programas ON persona.idProgramas = programas.idProgramas WHERE idPersona LIKE '%$busqueda%'");
        $consulta = mysqli_query($conexion, $buscar);
        while($row = $consulta->fetch_array()){
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
                            <th class="sort" style="text-align: center;" data-sort="correo">Correo</th>
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
                            <td class="dato" data-sort="correo"><?php echo $row['correo'] ?></td>
                            <td class="dato" align="center" data-sort="nombrePrograma"><?php echo ucfirst($row['nombrePrograma']) ?></td>
                            <td class="dato" align="center" data-sort="duracion"><?php echo $row['duracion'] ?></td>
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
                        }
                    }   
                        ?>

</body>
</html>