<?php

if($peticionAjax){
	require_once "../modelos/usuarioModelo.php";
	require_once "../modelos/DatosTablas/obtenerDatosConCondicion.php";
}else{
	require_once "./modelos/usuarioModelo.php";
	require_once "./modelos/DatosTablas/obtenerDatosConCondicion.php";
}


class usuarioControlador extends usuarioModelo{

	
	public function agregarUsuario(){
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['usuario_nuevo']));
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_usuario_nuevo']));
		$estado=1;
		$contrasena=ConexionBD::limpiar_cadena($_POST['contrasena_nuevo']);
		$conf_contrasena=ConexionBD::limpiar_cadena($_POST['conf_contrasena_nuevo']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_nuevo']);
		$rol=ConexionBD::limpiar_cadena($_POST['rol_nuevo']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');


		$nombre_img=($_FILES['imagen_nuevo']['name']);//ADQUIERE LA IMAGEN
		$temporal=$_FILES['imagen_nuevo']['tmp_name'];
		$carpeta='../vistas/assets/usuarios';
		$ruta=$carpeta.'/'.$nombre_img;
		move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);

		$clave=ConexionBD::EncriptaClave($contrasena);

		
		/* //validaciones de datos
		$datos=new obtenerDatosCondicionados();
		$resultado=$datos->datosTablasCondicionados('usuarios','usuario',$usuario);
        if($resultado->rowCount()==1){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Ya hay un usuario registrado en la base de datos con el nombre de usuario ingresado",
				"Tipo"=>"error"
			];	
		}else{
			echo 'registro encontrado';
		} */

		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Z]{1,30}",$usuario)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Usuario solo acepta letras, sin espacios ni carácteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[a-zA-Z0-9$@.-]{5,10}",$contrasena) ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La contraseña no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 

		if($contrasena!=$conf_contrasena){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Las contraseñas no coinciden. Ingreselas nuevamente.",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 
		
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_usuario_reg=[
				"usuario"=>$usuario,
				"nom"=>$nombre,
				"est"=>$estado,
				"cont"=>$clave,
				"correo"=>$correo,
				"rol"=>$rol,
				"imagen"=>$ruta,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$agregar_usuario=usuarioModelo::agregar_usuario_modelo($datos_usuario_reg);

			if($agregar_usuario->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Usuario Registrado",
					"Texto"=>"Los datos del usuario han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el usuario",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarUsuario(){	
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['usuario_act']));
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_usuario_act']));
		$estado=ConexionBD::limpiar_cadena($_POST['estado_act']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_act']);
		$rol=ConexionBD::limpiar_cadena($_POST['rol_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['usuario_id']);


		$nombre_img=($_FILES['imagen_act']['name']);//ADQUIERE LA IMAGEN
		$temporal=$_FILES['imagen_act']['tmp_name'];
		$carpeta='../vistas/assets/usuarios';
		$ruta=$carpeta.'/'.$nombre_img;
		move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);


				//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Z]{1,30}",$usuario)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Usuario solo acepta letras, sin espacios ni carácteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_usuario_act=[
				"usuario"=>$usuario,
				"nom"=>$nombre,
				"est"=>$estado,
				"correo"=>$correo,
				"rol"=>$rol,
				"imagen"=>$ruta,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$actualizar_usuario=usuarioModelo::actualizar_usuario_modelo($datos_usuario_act,$id_actualizacion);

			if($actualizar_usuario->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Usuario Actualizado",
					"Texto"=>"Los datos del usuario han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar el usuario",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarUsuario(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_usuario_del']));
			$array=array();
			$valor='';
		
		$eliminarUsuario=usuarioModelo::eliminar_usuario_modelo($id);
			if($eliminarUsuario->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Usuario Inactivado",
					"Texto"=>"El usuario seleccionado fue inactivado",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un error desconocido durante la operación",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}


	public function actualizarPerfil(){	
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['usuario_perfil_act']));
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_usuario_act']));
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_act']);
		$contrasena=ConexionBD::limpiar_cadena($_POST['contrasena_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['usuario_id']);
		$clave=ConexionBD::EncriptaClave($contrasena);


		//validacion para comprobar si se guardó una imagen nueva
		if(isset($_FILES['imagen_act']['name'])){
			$nombre_img=($_FILES['imagen_act']['name']);//ADQUIERE LA IMAGEN
			$temporal=$_FILES['imagen_act']['tmp_name'];
			$carpeta='../vistas/assets/usuarios';
			$ruta=$carpeta.'/'.$nombre_img;
			move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);
		}else{
			$ruta='';
		}
		

		//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Z]{1,30}",$usuario)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Usuario solo acepta letras, sin espacios ni carácteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}	

		if(ConexionBD::verificar_datos("[a-zA-Z0-9$@.-]{5,10}",$contrasena) ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La contraseña no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			
			$datos_perfil_act=[
				"usuario"=>$usuario,
				"nom"=>$nombre,
				"correo"=>$correo,
				"clave"=>$clave,
				"imagen"=>$ruta,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$actualizar_perfil=usuarioModelo::actualizar_perfil_modelo($datos_perfil_act,$id_actualizacion);

			if($actualizar_perfil->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Perfil de Usuario Actualizado",
					"Texto"=>"Los datos del usuario han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar los datos del usuario",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 
	
}