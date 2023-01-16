<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['nombre_insumo_nuevo']) || isset($_POST['nombre_insumo_act']) || isset($_POST['id_insumo_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/insumoControlador.php";
		$ins_insumo = new insumoControlador();


		/*--------- Agregar un insumo ---------*/
		if(isset($_POST['nombre_insumo_nuevo'])){
			echo $ins_insumo->agregarInsumo();
			echo $ins_insumo->agregarInsumoInventario();
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

	