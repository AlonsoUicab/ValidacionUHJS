<?php 
//seguridad de sesiones paginacion
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo'];
if($varsesion == null || $varsesion=''){
    header('location: modulo/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <title>Validacion</title>

</head>
<body class="bg-transparent">
    <!--Aqui es el encabezado donde se muestra el logo de la escuela y el cierre de session del programa-->
    <header>
        <nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #252850;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" style="height: 4rem;" class="perfil"> </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav mt-4">
                <li class="nav-item">
                    <!--Aqui se podra cerrar la session del programa-->
                <a href="config/cerrarsesion.php" class="btn btn-secondary" >Cerrar Sesion</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
        <!--Aqui empieza el contenido del programa-->
        <div id="tableExamp">
            <div>
                <h1 class="mt-3" style="text-align: center;">Bienvenido <?php echo $_SESSION['username']; ?></h1>
            </div>
            <div class="mt-5">
                <div class="shadow card text-end border-light mb-3">
                    <div class="card-body">
                <a href="#" class="btn btn-outline-dark me-1" data-bs-toggle="modal" data-bs-target="#programasModal" >
                        <i class="me-2 fa-solid fa-circle-plus"></i> Registrar Programa</a>
                <a href="#" class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#alumnosModal" >
                        <i class="me-2 fa-solid fa-circle-plus"></i> Registrar alumno</a>
                    </div>
                </div>
            <div class="card">
                <div class="card-body">
                <!--Inicio de la tabla-->
                <table class="table table-bordered border-black" id="myTable">
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
                        <th class="sort" style="text-align: center;" data-sort="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                        <!--Código php-->
                        <?php 
                        //se llama a la clase donde se encuentra la conexión
                        require("config/conexion_bd.php");
                        //se pide una consulta para especificar los datos solicitados
                        $imprimir=("SELECT * from persona
                                    INNER JOIN programas ON persona.idProgramas = programas.idProgramas");
                        $sql = mysqli_query($conexion, $imprimir);
                        //se realiza un ciclo para poder mostrar todos los datos almacenados de la base de datos
                        while($resultado = $sql->fetch_assoc()){
                        $fechaInicio = $resultado['fechaInicio'];
                        $inicioCambio= date("d/m/y", strtotime($fechaInicio));
                        $fechaFin = $resultado['fechaFin'];
                        $finCambio = date("d/m/y", strtotime($fechaFin));
                        ?>
                        <!--El contenido de la tabla donde se mostrarán los datos solicitados de la base de datos-->
                        <tr>
                        <td class="dato" align="center" data-sort="id"><?php echo $resultado['idPersona'] + 100000 ?></td>
                        <td class="dato" data-sort="nombre"><?php echo ucwords($resultado['nombre']) ?></td>
                        <td class="dato" data-sort="apellidoPaterno"><?php echo ucwords($resultado['apellidoPaterno']) ?></td>
                        <td class="dato" data-sort="apellidoMaterno"><?php echo ucwords($resultado['apellidoMaterno']) ?></td>
                        <td class="dato" data-sort="correo"><?php echo $resultado['correo'] ?></td>
                        <td class="dato" align="center" data-sort="nombrePrograma"><?php echo ucfirst($resultado['nombrePrograma']) ?></td>
                        <td class="dato" align="center" data-sort="duracion"><?php echo $resultado['duracion'] ?></td>
                        <td class="dato" align="center" data-sort="fechaInicio"><?php echo $inicioCambio ?></td>
                        <td class="dato" align="center" data-sort="fechaFin"><?php echo $finCambio ?></td> 
                        <td class="dato" align="center" data-sort="acciones">
                            <a href="#" class="btn btn-sm btn-outline-secondary" 
                                data-bs-id="<?=$resultado['idPersona']; ?>" data-bs-toggle="modal" data-bs-target="#editAlumnos">
                            <i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="libreria/Certificado.php?idPersona= <?php echo $resultado['idPersona'] ?>" class="btn btn-sm btn-outline-danger" target="_blank">
                                <i class="fa-sharp fa-solid fa-file-pdf"></i></a>
                        </td>
                        </tr>
                        <?php 
                        }?>
                </tbody>
                </table>
                </div>
            </div>
            <?php
            $sqlPrograma = "SELECT idProgramas, nombrePrograma, fechaInicio FROM programas";
            $programas = $conexion-> query($sqlPrograma);
            ?>
            <?php 
            include 'controlador.php';
            include 'alumnosModal.php'; 
            include 'programasModal.php';
            include 'editaAlumnoModal.php';
            ?>        
            </div>
        </div>
    <!--Se encuentra la funcion para el buscador-->
    <script src="assets/js/script.js"></script>
    <!--Bootstrap-->                
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--JQuery-->                
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
    <!--DATATABLE-->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
     
        $('#myTable').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Ningun Registro Encontrado",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': 'Buscar:',
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
            }

        })

        
        
        let alumnosModal = document.getElementById('alumnosModal')
        let editaModal = document.getElementById('editAlumnos')
        let programasModal = document.getElementById('programasModal')
                    
        //Funcion para limpiar el modal de alumnos
        alumnosModal.addEventListener('hide.bs.modal', event =>{
            alumnosModal.querySelector('.modal-body #nombre').value=""
            alumnosModal.querySelector('.modal-body #apellidoPaterno').value=""
            alumnosModal.querySelector('.modal-body #apellidoMaterno').value=""
            alumnosModal.querySelector('.modal-body #correo').value=""
            alumnosModal.querySelector('.modal-body #idProgramas').value=""
        })
        //Funcion para limpiar el modal de programas
        programasModal.addEventListener('hide.bs.modal', event =>{
            programasModal.querySelector('.modal-body #nombrePrograma').value=""
            programasModal.querySelector('.modal-body #duracion').value=""
            programasModal.querySelector('.modal-body #fechaInicio').value=""
            programasModal.querySelector('.modal-body #fechaFin').value=""
        })
        //Funcion para poder editar un alumno
        editaModal.addEventListener('shown.bs.modal' , event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputId = editaModal.querySelector('.modal-body #idPersona')
            let inputName = editaModal.querySelector('.modal-body #nombre')
            let inputApellidoPaterno = editaModal.querySelector('.modal-body #apellidoPaterno')
            let inputApellidoMaterno = editaModal.querySelector('.modal-body #apellidoMaterno')
            let inputCorreo = editaModal.querySelector('.modal-body #correo')
            let inputCurso = editaModal.querySelector('.modal-body #idProgrmas')

            let url = "modulo/getAlumnos.php"
            let formData = new FormData()
            formData.append('idPersona', id)

            fetch(url, {
                method:"POST",
                body: formData
            }).then(response => response.json())
            .then(data => {

                inputId.value = data.idPersona
                inputName.value = data.nombre
                inputApellidoPaterno.value = data.apellidoPaterno
                inputApellidoMaterno.value = data.apellidoMaterno
                inputCorreo.value = data.correo
                inputCurso.value = data.idProgramas

            }).catch(err => console.log(err))
        })

    </script>
    </body>
</html>