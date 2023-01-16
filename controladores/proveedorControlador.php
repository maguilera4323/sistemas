<?php

if($peticionAjax){
	require_once "../modelos/proveedorModelo.php";
}else{
	require_once "./modelos/proveedorModelo.php";
}


class proveedorControlador extends proveedorModelo{

	
	public function agregarProveedor(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_proveedor_nuevo']));
		$rtn=ConexionBD::limpiar_cadena($_POST['rtn_proveedor_nuevo']);
		$telefono=ConexionBD::limpiar_cadena($_POST['telefono_proveedor_nuevo']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_proveedor_nuevo']);
		$direccion=ConexionBD::limpiar_cadena($_POST['direccion_proveedor_nuevo']);
		
		//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El nombre no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,14}",$rtn)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El RTN no admite letras o caracteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
		
		if(ConexionBD::verificar_datos("[0-9]{1,20}",$telefono)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Este campo solo admite números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[a-z@_0-9.]{1,30}",$correo)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El correo no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9 .,]{1,250}",$direccion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La dirección no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_proveedor_reg=[
				"nombre"=>$nombre,
				"rtn"=>$rtn,
				"telefono"=>$telefono,
				"correo"=>$correo,
				"direccion"=>$direccion
			];

			$agregar_proveedor=proveedorModelo::agregar_proveedor_modelo($datos_proveedor_reg);

			if($agregar_proveedor->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Proveedor Registrado",
					"Texto"=>"Los datos del proveedor han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el proveedor",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarProveedor(){	
		$id_actualizar=ConexionBD::limpiar_cadena($_POST['id_actualizacion']);
		$nombre=ConexionBD::limpiar_cadena($_POST['nombre_proveedor_actu']);
		$rtn=ConexionBD::limpiar_cadena($_POST['rtn_proveedor_actu']);
		$telefono=ConexionBD::limpiar_cadena($_POST['telefono_proveedor_actu']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_proveedor_actu']);
		$direccion=ConexionBD::limpiar_cadena($_POST['direccion_proveedor_actu']);

			//validaciones de datos ingresados
			if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El nombre no coincide con el formato solicitado",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}

			if(ConexionBD::verificar_datos("[0-9]{1,14}",$rtn)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El RTN no admite letras o caracteres especiales",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
			
			if(ConexionBD::verificar_datos("[0-9]{1,20}",$telefono)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Este campo solo admite números",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}

			if(ConexionBD::verificar_datos("[a-z@_0-9.]{1,30}",$correo)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El correo no coincide con el formato solicitado",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}

			if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9 .,]{1,100}",$direccion)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"La dirección no coincide con el formato solicitado",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
		
	
			//arreglo enviado al modelo
		$datos_proveedor_actu=
			[
				"nombre"=>$nombre,
				"rtn"=>$rtn,
				"telefono"=>$telefono,
				"correo"=>$correo,
				"direccion"=>$direccion,
						
			];

			$actualizar_proveedor=proveedorModelo::actualizar_proveedor_modelo($datos_proveedor_actu,$id_actualizar);

			if($actualizar_proveedor->rowCount()==1)
			{
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Proveedor Actualizado",
					"Texto"=>"Proveedor Actualizado exitosamente",
					"Tipo"=>"success"
				];
			}else
			{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar el proveedor",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);	
	} 

	public function eliminarProveedor(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_proveedor_del']));
			$array=array();
			$valor='';
		
		$eliminarproveedor=proveedorModelo::eliminar_proveedor_modelo($id);
			if($eliminarproveedor->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Proveedor Eliminado",
					"Texto"=>"El Proveedor fue eliminado del sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"El proveedor no puede ser borrado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}
	
}