<?php

if($peticionAjax){
	require_once "../modelos/compraModelo.php";
}else{
	require_once "./modelos/compraModelo.php";
}


class compraControlador extends compraModelo{

	
	public function agregarCompra(){
		$proveedor=ConexionBD::limpiar_cadena($_POST['proveedor_nuevo']);
		$estado=ConexionBD::limpiar_cadena($_POST['estado_nuevo']);
		$fecha_entrega=ConexionBD::limpiar_cadena($_POST['fecha_entrega']);
		$total=ConexionBD::limpiar_cadena($_POST['subTotal']);
		$usuario=ConexionBD::limpiar_cadena($_POST['usuario']);
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_compra_reg=[
				"prov"=>$proveedor,
				"estado"=>$estado,
				"fech_ent"=>$fecha_entrega,
				"total"=>$total,
				"usuario"=>$usuario
			];

			$agregar_compra=compraModelo::agregar_compra_modelo($datos_compra_reg);
	} 

	public function agregarDetalleCompra(){
		for ($i = 0; $i <count($_POST['nombreInsumo']); $i++) {
		$insumo=ConexionBD::limpiar_cadena($_POST['nombreInsumo'][$i]);
		$cantidad=ConexionBD::limpiar_cadena($_POST['cantidad'][$i]);
		$precio=ConexionBD::limpiar_cadena($_POST['precio'][$i]);
		$id_compra=ConexionBD::limpiar_cadena($_POST['idCompra']);
		$estado=ConexionBD::limpiar_cadena($_POST['estado_nuevo']);
				
 			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_detallecompra_reg=[
				"ins"=>$insumo,
				"cant"=>$cantidad,
				"prec"=>$precio,
				"id_compra"=>$id_compra,
				"estado"=>$estado
			];

			$agregar_detalle_compra=compraModelo::agregar_detallecompra_modelo($datos_detallecompra_reg); 
	} 

		if($i>0){
			$alerta=[
				"Alerta"=>"redireccionar",
				"Titulo"=>"Compra Registrada",
				"Texto"=>"Los datos de la compra han sido registrados en el sistema",
				"Tipo"=>"success",
				"URL"=>'compras/'
			];
			echo json_encode($alerta);
		
		}else{
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"No hemos podido guardar la compra",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
		}
		
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