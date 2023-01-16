<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatos.php"); 
?>

<h3 style="padding:5rem;"><i class="fas fa-boxes"></i> &nbsp; PROVEEDORES </h3>

<div class="botones-proveedores">
<div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PROVEEDOR</div>
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered text-center table-striped ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>RTN</th>
                <th>Teléfono</th>
                <th>Correo electronico</th>
                <th>Dirección</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('proveedores');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_proveedor']; ?></td>
                <td><?php echo $fila['nom_proveedor']; ?></td>
                <td><?php echo $fila['rtn_proveedor']; ?></td>
                <td><?php echo $fila['tel_proveedor']; ?></td>
                <td><?php echo $fila['correo_proveedor']; ?></td>
                <td><?php echo $fila['dir_proveedor']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_proveedor'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_proveedor'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Proveedor</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body">
									<form action="<?php echo SERVERURL; ?>ajax/proveedorAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
									<div class="form-group">
											<label class="label-actualizar">Nombre</label>
											<input type="text" class="form-control" name="nombre_proveedor_actu" value="<?php echo $fila['nom_proveedor']?>"  required>
										</div>
                                        <br>
										<div class="form-group">
											<label class="label-actualizar">RTN</label>
											<input type="text" class="form-control" name="rtn_proveedor_actu" value="<?php echo $fila['rtn_proveedor']?>" required>
										</div>
                                        <br>
										<div class="form-group">
											<label class="label-actualizar">Correo</label>
											<input type="text" class="form-control" name="correo_proveedor_actu" value="<?php echo $fila['correo_proveedor']?>" required>
										</div>
                                        <br>
										<div class="form-group">
											<label class="label-actualizar">Telefono</label>
											<input type="text" class="form-control" name="telefono_proveedor_actu" value="<?php echo $fila['tel_proveedor']?>" required>
										</div>
                                        <br>
										<div class="form-group">
											<label class="label-actualizar">Dirección</label>
											<input type="text" class="form-control" name="direccion_proveedor_actu" value="<?php echo $fila['dir_proveedor']?>" required>
										</div>
                                        <br>
										<div class="form-group">
											<input type="hidden" class="form-control" name="id_actualizacion" value="<?php echo $fila['id_proveedor']?>">
										</div>
										<button type="submit" class="btn btn-primary">Guardar</button>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
										</form>
									</div>
								</div>
                            </div>
                        </div>
			    </td>
                <td>
                    <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/proveedorAjax.php" method="POST" data-form="delete" autocomplete="off">
                    <input type="hidden" pattern="" class="form-control" name="id_proveedor_del" value="<?php echo $fila['id_proveedor'] ?>">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

    <!-- <br>
    <table id="tablaUsuarios">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RTN</th>
                <th>Teléfono</th>
                <th>Correo electronico</th>
                <th>Dirección</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        </tbody>

    </table>
 -->
</div>


    <!-- Modal -->
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
			<form action="<?php echo SERVERURL; ?>ajax/proveedorAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="form-group">
				<label class="color-label">Nombre</label>
				<input type="text" class="form-control" name="nombre_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">RTN</label>
				<input type="text" class="form-control" name="rtn_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Correo</label>
				<input type="text" class="form-control" name="correo_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Telefono</label>
				<input type="text" class="form-control" name="telefono_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Dirección</label>
				<input type="text" class="form-control" name="direccion_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>


  