<!--Modal para el registro de los cursos-->
<div class="modal fade" id="programasModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Agregar Programa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
        <form action="modulo/guardarProgramas.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombrePrograma" class="form-label">Nombre del Curso:</label>
                <input type="text" name="nombrePrograma" id="nombrePrograma" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="duracion" class="form-label">Duracion:</label>
                <input type="number" name="duracion" id="duracion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha Inicio:</label>
                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fechaFin" class="form-label">Fecha Fin:</label>
                <input type="date" name="fechaFin" id="fechaFin" class="form-control" required>
            </div>

            <div class="mb-3 ">
                <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-regular fa-floppy-disk"></i> Guardar Registro</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>