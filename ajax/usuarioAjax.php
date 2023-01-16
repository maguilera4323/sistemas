<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['usuario_nuevo']) || isset($_POST['usuario_act']) || isset($_POST['id_usuario_del'])|| isset($_POST['usuario_perfil_act']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/usuarioControlador.php";
		$ins_usuario = new usuarioControlador();


		/*--------- Agregar un usuario ---------*/
		if(isset($_POST['usuario_nuevo'])){
			echo $ins_usuario->agregarUsuario();
			die();
		}
		
		/*--------- Editar un usuario ---------*/
		if(isset($_POST['usuario_act'])){
			echo $ins_usuario->actualizarUsuario();
			die();
		}
		
		/*--------- Eliminar un usuario ---------*/
		if(isset($_POST['id_usuario_del']) ){
			echo $ins_usuario->eliminarUsuario();
			die();
		}

		/*--------- Actualizar informacion de perfil ---------*/
		if(isset($_POST['usuario_perfil_act']) ){
			echo $ins_usuario->actualizarPerfil();
			die();
		}
	}

	