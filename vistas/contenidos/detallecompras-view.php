<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatosDetalleCompras.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-shopping-cart"></i> &nbsp; DETALLE DE COMPRAS </h3>
        <?php
			//variables para generar la url completa del sitio y obtener el id del registro
			$host= $_SERVER["HTTP_HOST"];
			$url= $_SERVER["REQUEST_URI"];
			$url_completa="http://" . $host . $url; 
			//variable que contiene el id de la compra a editar
			$id_compra = explode('/',$url_completa)[5];
        
        ?>
<div class="botones-proveedores">
    <a href="<?php echo SERVERURL?>compras/"><div class="btn btn-dark btn-lg">&nbsp; REGRESAR A COMPRAS</div></a>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosDetalle();
                $resultado=$datos->datosDetalleCompras($id_compra);
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nom_insumo']; ?></td>
                <td><?php echo $fila['cantidad_comprada']; ?></td>
                <td><?php echo $fila['precio_costo']; ?></td>
                <td><?php echo $fila['estado_compra']; ?></td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>

