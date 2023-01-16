<?php

if($peticionAjax){
	require_once "../modelos/insumoModelo.php";
}else{
	require_once "./modelos/insumoModelo.php";
}


class insumoControlador extends insumoModelo{

	
	public function agregarInsumo(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_insumo_nuevo']));
		$categoria=ConexionBD::limpiar_cadena($_POST['categoria_insumo_nuevo']);
		$cantidad_max=ConexionBD::limpiar_cadena($_POST['cant_max_nuevo']);
		$cantidad_min=ConexionBD::limpiar_cadena($_POST['cant_min_nuevo']);
		$unidad_medida=ConexionBD::limpiar_cadena($_POST['unidad_insumo_nuevo']);
		
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

		if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_max)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Este campo no admite letras o caracteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_min)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Este campo no admite letras o caracteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
		
		if($cantidad_max<$cantidad_min){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La cantidad máxima no puede ser menor que la cantidad minina",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_insumo_reg=[
				"nombre"=>$nombre,
				"cat"=>$categoria,
				"cant_max"=>$cantidad_max,
				"cant_min"=>$cantidad_min,
				"unid"=>$unidad_medida
			];

			$agregar_insumo=insumoModelo::agregar_insumo_modelo($datos_insumo_reg);

			if($agregar_insumo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Insumo Registrado",
					"Texto"=>"Los datos del insumo han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el insumo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 

	public function agregarInsumoInventario(){
		$cantidad=0;
			$datos_inv_insumo_reg=[
				"cant"=>$cantidad,
			];

			$agregar_inv_insumo=insumoModelo::agregar_inv_insumo_modelo($datos_inv_insumo_reg);

	} 



	public function actualizarInsumo(){	
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_insumo_act']));
		$categoria=ConexionBD::limpiar_cadena($_POST['categoria_insumo_act']);
		$cantidad_max=ConexionBD::limpiar_cadena($_POST['cant_max_act']);
		$cantidad_min=ConexionBD::limpiar_cadena($_POST['cant_min_act']);
		$unidad_medida=ConexionBD::limpiar_cadena($_POST['unidad_insumo_act']);
		$id_actualizar=ConexionBD::limpiar_cadena($_POST['id_actualizacion']);

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
	
			if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_max)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Este campo no admite letras o caracteres especiales",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
	
			if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_min)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Este campo no admite letras o caracteres especiales",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
			
			if($cantidad_max<$cantidad_min){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"La cantidad máxima no puede ser menor que la cantidad minina",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
		
	
			//arreglo enviado al modelo
		$datos_insumo_actu=
			[
				"nombre"=>$nombre,
				"cat"=>$categoria,
				"cant_max"=>$cantidad_max,
				"cant_min"=>$cantidad_min,
				"unid"=>$unidad_medida
			];

			$actualizar_insumo=insumoModelo::actualizar_insumo_modelo($datos_insumo_actu,$id_actualizar);

			if($actualizar_insumo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Insumo Actualizado",
					"Texto"=>"Insumo Actualizado exitosamente",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar el insumo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);	
	} 



	public function eliminarInsumo(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_insumo_del']));
			$array=array();
			$valor='';
		
		$eliminarInsumo=insumoModelo::eliminar_insumo_modelo($id);
			if($eliminarInsumo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Insumo Eliminado",
					"Texto"=>"El insumo fue eliminado del sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"El insumo no puede ser borrado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}
	
}