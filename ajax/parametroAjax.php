<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['parametro_nuevo']) || isset($_POST['parametro_act']) || isset($_POST['id_parametro_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/parametroControlador.php";
		$ins_parametro = new parametroControlador();


		/*--------- Agregar un parametro ---------*/
		if(isset($_POST['parametro_nuevo'])){
			echo $ins_parametro->agregarParametro();
			die();
		}
		
		/*--------- Editar un parametro ---------*/
		if(isset($_POST['parametro_act'])){
			echo $ins_parametro->actualizarParametro();
			die();
		}
		
		/*--------- Eliminar un parametro ---------*/
		if(isset($_POST['id_parametro_del']) ){
			echo $ins_parametro->eliminarParametro();
			die();
		}
	}

	