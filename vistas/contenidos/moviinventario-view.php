<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatosMovimientos.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-dolly"></i> &nbsp; MOVIMIENTOS DE INVENTARIO </h3>

<div class="botones-proveedores">
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
    <a href="<?php echo SERVERURL?>inventario/">
    <button type="submit" class="btn btn-dark mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Regresar al Inventario</button>
    </a>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosMovimientos();
                $resultado=$datos->datosMovimientos();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nom_insumo']; ?></td>
                <td><?php echo $fila['cant_movimiento']; ?></td>
                <td><?php echo $fila['tipo_movimiento']; ?></td>
                <td><?php echo $fila['fecha_movimiento']; ?></td>
                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['comentario']; ?></td>
            </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>

