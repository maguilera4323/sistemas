<?php

if($peticionAjax){
	require_once "../modelos/parametroModelo.php";
}else{
	require_once "./modelos/parametroModelo.php";
}


class parametroControlador extends parametroModelo{

	
	public function agregarParametro(){
		$parametro=ConexionBD::limpiar_cadena(strtoupper($_POST['parametro_nuevo']));
		$valor=ConexionBD::limpiar_cadena($_POST['valor_nuevo']);
		$idUsuario=ConexionBD::limpiar_cadena($_POST['usuario_id']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');
		
		//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ_]{1,40}",$parametro)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El nombre del parámetro no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9]{1,40}",$valor)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El valor del parámetro no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_parametro_reg=[
				"parametro"=>$parametro,
				"valor"=>$valor,
				"id"=>$idUsuario,
				"creado_por"=>$creado_por,
				"creacion"=>$creacion
			];

			$agregar_parametro=parametroModelo::agregar_parametro_modelo($datos_parametro_reg);

			if($agregar_parametro->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Parámetro Registrado",
					"Texto"=>"Los datos del parámetro han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el parámetro",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarParametro(){	
		$parametro=ConexionBD::limpiar_cadena(strtoupper($_POST['parametro_act']));
		$valor=ConexionBD::limpiar_cadena($_POST['valor_act']);
		$id_actualizar=ConexionBD::limpiar_cadena($_POST['parametro_id']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');

			//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ_]{1,40}",$parametro)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El nombre del parámetro no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9]{1,40}",$valor)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El valor del parámetro no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_parametro_act=[
				"parametro"=>$parametro,
				"valor"=>$valor,
				"modif_por"=>$modif_por,
				"fecha_modif"=>$modificacion
			];

			$actualizar_parametro=parametroModelo::actualizar_parametro_modelo($datos_parametro_act,$id_actualizar);

			if($actualizar_parametro->rowCount()==1)
			{
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Parámetro Actualizado",
					"Texto"=>"Parámetro Actualizado exitosamente",
					"Tipo"=>"success"
				];
			}else
			{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar el paránetro",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);	
	} 

	public function eliminarParametro(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_parametro_del']));
			$array=array();
			$valor='';
		
		$eliminarParametro=parametroModelo::eliminar_parametro_modelo($id);
			if($eliminarParametro->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Parámetro Eliminado",
					"Texto"=>"El Parámetro fue eliminado del sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"El parámetro no puede ser borrado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}
	
}