<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['proveedor_nuevo']) || isset($_POST['nombre_insumo_act']) || isset($_POST['id_insumo_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/compraControlador.php";
		$ins_compra = new compraControlador();


		/*--------- Agregar una compra ---------*/
		if(isset($_POST['proveedor_nuevo'])){
			echo $ins_compra->agregarCompra();
			echo $ins_compra->agregarDetalleCompra();
			die();
		}
		
		/*--------- Editar un proveedor ---------*/
		if(isset($_POST['nombre_insumo_act']) ){
			echo $ins_insumo->actualizarInsumo();
			die();
		}
		
		/*--------- Eliminar un insumo ---------*/
		if(isset($_POST['id_insumo_del']) ){
			echo $ins_insumo->eliminarInsumo();
			die();
		}
	}

	