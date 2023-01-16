<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatos.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-box-open"></i> &nbsp; INSUMOS </h3>

<div class="botones-proveedores">
	<div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR INSUMO</div>
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center datos-usuario">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Cantidad Maxima</th>
                <th>Cantidad Minima</th>
                <th>Unidad de medida</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('insumos');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_insumo']; ?></td>
                <td><?php echo $fila['nom_insumo']; ?></td>
                <td><?php echo $fila['categoria']; ?></td>
                <td><?php echo $fila['cant_max']; ?></td>
                <td><?php echo $fila['cant_min']; ?></td>
                <td><?php echo $fila['unidad_medida']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_insumo'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_insumo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Insumo</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/insumoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                    <div class="form-group">
                                        <label class="label-actualizar" style="float: left;">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_insumo_act" maxlength="27" value="<?php echo $fila['nom_insumo']?>" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Categoria</label>
                                            <select class="form-control" name="categoria_insumo_act" required>
                                                <option value="1" <?php if ($fila['categoria'] == 'Comestibles'): ?> selected<?php endif; ?>>Comestibles</option>
                                                <option value="2" <?php if ($fila['categoria'] == 'Utensillos'): ?> selected<?php endif; ?>>Utensillos</option>
                                                <option value="3" <?php if ($fila['categoria'] == 'Varios'): ?> selected<?php endif; ?>>Varios</option>
                                            </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Cantidad Maxima</label>
                                        <input type="number" class="form-control" name="cant_max_act" value="<?php echo $fila['cant_max']?>" maxlength="27" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Cantidad Minima</label>
                                        <input type="number" class="form-control" name="cant_min_act" value="<?php echo $fila['cant_min']?>" maxlength="27" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Unidad de medida</label>
                                                <select class="form-control" name="unidad_insumo_act" required>
													<option value="1" <?php if ($fila['unidad_medida'] == 'LB'): ?>selected<?php endif; ?>>LB</option>
													<option value="2" <?php if ($fila['unidad_medida'] == 'UN'): ?>selected<?php endif; ?>>UN</option>
													<option value="3" <?php if ($fila['unidad_medida'] == 'L'): ?>selected<?php endif; ?>>L</option>
													<option value="4" <?php if ($fila['unidad_medida'] == 'GAL'): ?>selected<?php endif; ?>>GAL</option>
                                                    <option value="5" <?php if ($fila['unidad_medida'] == 'BOLSAS'): ?>selected<?php endif; ?>>BOLSAS</option>
                                                </select>
                                    </div>
                                    <div class="col-12 col-md-4">
										<div class="form-group">
											<input type="hidden" pattern="" class="form-control" name="id_actualizacion" value="<?php echo $fila['id_insumo']; ?>">
										</div>
									</div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
			    </td>
				<td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/insumoAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_insumo_del" value="<?php echo $fila['id_insumo'] ?>">	
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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Insumo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
			<form action="<?php echo SERVERURL; ?>ajax/insumoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="form-group">
				<label class="color-label">Nombre</label>
				<input type="text" class="form-control" name="nombre_insumo_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Categoria</label>
					<select class="form-control" name="categoria_insumo_nuevo" id="unidad_insumo_nuevo" required>
						<option value="" selected="" disabled="">Seleccione una opción</option>
						<option value="1">Comestibles</option>
						<option value="2">Utensillos</option>
						<option value="3">Varios</option>
					</select>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Cantidad Maxima</label>
				<input type="number" class="form-control" name="cant_max_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Cantidad Minima</label>
				<input type="number" class="form-control" name="cant_min_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Unidad de medida</label>
						<select class="form-control" name="unidad_insumo_nuevo" id="unidad_insumo_nuevo" required>
							<option value="" selected="" disabled="">Seleccione una opción</option>
							<option value="1">LB</option>
							<option value="2">UN</option>
							<option value="3">L</option>
							<option value="4">GAL</option>
                            <option value="5">BOLSAS</option>
					    </select>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>



