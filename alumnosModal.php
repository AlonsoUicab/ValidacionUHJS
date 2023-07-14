<!--Modal para el registro de alumnos-->
<div class="modal fade" id="alumnosModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Agregar Alumno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modulo/guardarAlumnos.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre(s):</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombrePrograma" class="form-label">Curso:</label></br>
                <a href="#" class="btn btn-outline-info mb-3" data-bs-toggle="modal" data-bs-target="#programasModal">Nuevo Programa</a>
                <select name="idProgramas" id="idProgramas" class="form-control" required>
                  <option value="">Seleccionar...</option>
                  <?php while($row_programa = $programas-> fetch_assoc()) { ?>
                  <option value="<?php echo $row_programa["idProgramas"]; ?>"><?= ucfirst($row_programa["nombrePrograma"]),  
                  " ", $row_programa["fechaInicio"]?></option>
                  <?php }?>
                  </select>
            </div>

            <div class="mb-3 ">
                <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-primary"><i class="fa-regular fa-floppy-disk"></i> Guardar Registro</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>