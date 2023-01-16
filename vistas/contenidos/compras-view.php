<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatosCompras.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-shopping-cart"></i> &nbsp; COMPRAS </h3>

<div class="botones-proveedores">
    <a href="<?php echo SERVERURL?>nuevacompra/"><div class="btn btn-dark btn-lg"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR COMPRA</div></a>
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Ver Más</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosCompras();
                $resultado=$datos->datosCompras();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_compra']; ?></td>
                <td><?php echo $fila['nom_proveedor']; ?></td>
                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['estado_compra']; ?></td>
                <td><?php echo $fila['fech_compra']; ?></td>
                <td><?php echo $fila['total_compra']; ?></td>
                <td><a href="<?php echo SERVERURL; ?>detallecompras/<?php echo $fila['id_compra']?>">
                <i class="fas fa-exclamation-circle" style="color:black; justify-items:center;"></i></a></td>    
                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_compra'];?>">
					<i class="fas fa-sync-alt"></i>
                </button></td>
                <td>
                <button type="submit" class="btn btn-danger">
						<i class="far fa-trash-alt"></i>
					</button></td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>

