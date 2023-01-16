<?php

if($peticionAjax){
	require_once "../modelos/rolModelo.php";
}else{
	require_once "./modelos/rolModelo.php";
}


class rolControlador extends rolModelo{

	
	public function agregarRol(){
		$rol=ConexionBD::limpiar_cadena(strtoupper($_POST['rol_nuevo']));
		$descripcion=ConexionBD::limpiar_cadena($_POST['descripcion_nuevo']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');
		
		//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$rol)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El nombre del rol no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_rol_reg=[
				"rol"=>$rol,
				"desc"=>$descripcion,
				"creado_por"=>$creado_por,
				"creacion"=>$creacion
			];

			$agregar_rol=rolModelo::agregar_rol_modelo($datos_rol_reg);

			if($agregar_rol->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Rol Registrado",
					"Texto"=>"Los datos del rol han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el rol",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarRol(){	
		$rol=ConexionBD::limpiar_cadena(strtoupper($_POST['rol_act']));
		$descripcion=ConexionBD::limpiar_cadena($_POST['descripcion_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_actualizar=ConexionBD::limpiar_cadena($_POST['rol_id']);


		//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$rol)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El nombre del rol no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_rol_act=[
				"rol"=>$rol,
				"desc"=>$descripcion,
				"modif_por"=>$modif_por,
				"fecha_modif"=>$modificacion
			];
	
					
			$actualizar_rol=rolModelo::actualizar_rol_modelo($datos_rol_act,$id_actualizar);

			if($actualizar_rol->rowCount()==1)
			{
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Rol Actualizado",
					"Texto"=>"Rol Actualizado exitosamente",
					"Tipo"=>"success"
				];
			}else
			{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar el rol",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);	
	} 

	public function eliminarRol(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_rol_del']));
			$array=array();
			$valor='';
		
		$eliminarRol=rolModelo::eliminar_rol_modelo($id);
			if($eliminarRol->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Rol Eliminado",
					"Texto"=>"El rol fue eliminado del sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"El rol no puede ser borrado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}
	
}