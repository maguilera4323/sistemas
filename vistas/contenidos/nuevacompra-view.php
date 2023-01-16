<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatos.php"); 
?>

<h3 style="padding:5rem;"><i class="fas fa-shopping-cart"></i> &nbsp; NUEVA COMPRA </h3>

<div class="container">
<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/compraAjax.php" method="POST" data-form="save" autocomplete="off">
        <div class="row">
            <?php
                $datosCompra=new obtenerDatosTablas();
                $resultado=$datosCompra->datosTablas('compras');
                if($resultado->fetchColumn() > 0){
                    foreach ($resultado as $fila){
						$idCompraActual=$fila['id_compra']+1;
					}
                }else{
					$idCompraActual=1;
				}

			?>

				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
					<div class="form-group">
						<label>Proveedor</label>
						<select class="form-control" name="proveedor_nuevo" id="proveedor_nuevo" required>
						<option value="" selected="" disabled="">Seleccione una opción</option>
							<?php
                            $datosProveedor=new obtenerDatosTablas();
                            $resultado=$datosProveedor->datosTablas('proveedores');
                            foreach ($resultado as $fila){
									echo '<option value='.$fila['id_proveedor'].'>'.$fila['nom_proveedor'].'</option>';
								}
							?>
						</select>
					</div>
                    <br>
                    <div class="form-group">
						<label>Estado</label>
						<select class="form-control" name="estado_nuevo" id="estado_nuevo" required>
						<option value="" selected="" disabled="">Seleccione una opción</option>
						<option value="1">Realizada</option>
                        <option value="2">Pendiente</option>
						</select>
					</div>	
				</div> 
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
						<label class="color-label">Fecha Entrega</label>
						<input type="date" class="form-control" name="fecha_entrega" id="fecha_entrega" required>
					</div>
                    <br>
					<div class="form-group">
						<label class="color-label">Usuario</label>
						<input type="text" class="form-control" value="<?php echo $_SESSION['usuario_login'];?>" style="text-transform:uppercase;"  disabled>
					    <input type="hidden" name="idCompra" id="idCompra" class="form-control" value="<?php echo $idCompraActual; ?>" autocomplete="off">
					</div>			
				</div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
						<label class="color-label">Fecha</label>
						<?php $fcha = date("Y-m-d");?>
						<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fcha?>" disabled>
					</div>	
				</div>   
        </div>     
        <br>
        <br>
        <div class="row">
        
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRowsFactura" type="button">- Eliminar</button>
					<button class="btn btn-success" id="addRowsFactura" type="button">+ Agregar Más</button>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItemFactura">
						<tr>
							<th width="2%"><input id="checkAllFactura" class="formcontrol" type="checkbox"></th>
							<th width="19%">Insumo</th>
							<th width="15%">Cantidad </th>
							<th width="15%">Precio</th>
							<th width="15%">Total</th>
						</tr>
						<tr>
							<td><input class="itemRowFactura" type="checkbox"></td>
							<td><select name="nombreInsumo[]" id="nombreInsumo_1" class="form-control nombreInsumo" required>
                            <option value="" selected="" disabled="">Seleccione una opción</option>
									<?php
									$datosInsumo=new obtenerDatosTablas();
                                    $resultado=$datosInsumo->datosTablas('insumos');
                                    foreach ($resultado as $fila){
                                            echo '<option value='.$fila['id_insumo'].'>'.$fila['nom_insumo'].'</option>';
                                        }
                                    ?>
							</select></td>
							<td><input type="number" name="cantidad[]" id="cantidad_1" class="form-control quantity" required></td>
							<td><input type="number" name="precio[]" id="precio_1" class="form-control price" required></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" readonly></td>
						</tr>
					</table>
				</div>
			</div>
            <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

			</div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

			</div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

			</div>
            <div class="col-xs-11 col-sm-4 col-md-3 col-lg-3">
				<label class="color-label">Total: &nbsp;</label>
                <input type="number" class="form-control" name="subTotal" step="any" id="subTotal" 
				placeholder="Total" readonly>
            </div>
                
						
            <div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['id_login']; ?>" class="form-control" name="usuario">
						<input type="submit" name="invoice_btn" value="Guardar Factura" class="btn btn-success submit_btn invoice-save-btm" style="font-size:20px; border: 2px solid #777574;">
					</div>
				</div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
					<br>
					<div class="form-group">
						<a href="<?php echo SERVERURL; ?>compras/"><input value="Salir" 
						class="btn btn-success submit_btn invoice-save-btm" style="font-size:20px; border: 2px solid #777574;"></a>
					</div>
				</div>
			</div>
			<br>
			<br>
    </form>
</div>


