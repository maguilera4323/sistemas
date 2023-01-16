<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatos.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-users-cog"></i> &nbsp; PARAMETROS </h3>

<div class="botones-proveedores">
	<div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PARAMETRO</div>
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center datos-usuario">
        <thead>
            <tr>
                <th>ID</th>
                <th>Parametro</th>
                <th>Valor</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('parametros');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_parametro']; ?></td>
                <td><?php echo $fila['parametro']; ?></td>
                <td><?php echo $fila['valor']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_parametro'];?>">
					<i class="fas fa-sync-alt"></i>
				</button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_parametro'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Parámetro</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/parametroAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label class="label-actualizar">Parámetro</label>
                                    <input type="text" class="form-control" name="parametro_act" id="cliente_dni" maxlength="27" 
                                    style="text-transform:uppercase;" value="<?php echo $fila['parametro']?>" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Valor</label>
                                    <input type="text" class="form-control" name="valor_act" id="cliente_dni" maxlength="27" 
                                    value="<?php echo $fila['valor']?>" required>
                                </div>
                                <br>
                                    <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                    <input type="hidden" value="<?php echo $fila['id_parametro']; ?>" class="form-control" name="parametro_id">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </form>
                        </div>
			    </td>
				<td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/parametroAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_parametro_del" value="<?php echo $fila['id_parametro'] ?>">	
					<button type="submit" class="btn btn-danger">
						<i class="far fa-trash-alt"></i>
					</button>
					</form>
				</td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>


<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Parámetro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
			<form action="<?php echo SERVERURL; ?>ajax/parametroAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="form-group">
				<label class="color-label">Parámetro</label>
				<input type="text" class="form-control" name="parametro_nuevo" id="cliente_dni" maxlength="27" 
                style="text-transform:uppercase;" required>
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Valor</label>
				<input type="text" class="form-control" name="valor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
            <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
            <input type="hidden" value="<?php echo $_SESSION['id_login']; ?>" class="form-control" name="usuario_id">
            <button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>



