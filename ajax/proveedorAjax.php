<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['nombre_proveedor_nuevo']) || isset($_POST['nombre_proveedor_actu']) || isset($_POST['id_proveedor_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/proveedorControlador.php";
		$ins_proveedor = new proveedorControlador();


		/*--------- Agregar un proveedor ---------*/
		if(isset($_POST['nombre_proveedor_nuevo'])){
			echo $ins_proveedor->agregarProveedor();
			die();
		}
		
		/*--------- Editar un proveedor ---------*/
		if(isset($_POST['nombre_proveedor_actu']) ){
			echo $ins_proveedor->actualizarProveedor();
			die();
		}
		
		/*--------- Eliminar un proveedor ---------*/
		if(isset($_POST['id_proveedor_del']) ){
			echo $ins_proveedor->eliminarProveedor();
			die();
		}
	}

	