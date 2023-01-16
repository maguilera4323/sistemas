<?php
	
	require_once "../config/conexion.php";

	class parametroModelo extends ConexionBD{

		protected function agregar_parametro_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO parametros(parametro,valor,
			id_usuario,creado_por,fecha_creacion)
			VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['parametro']);
			$sql->bindParam(2,$datos['valor']);
			$sql->bindParam(3,$datos['id']);
			$sql->bindParam(4,$datos['creado_por']);
			$sql->bindParam(5,$datos['creacion']);
			$sql->execute();
			return $sql;								
		}



		protected function actualizar_parametro_modelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE parametros SET parametro=?,valor=?,modificado_por=?,
			fecha_modificacion=?  WHERE id_parametro=?");

			$sql->bindParam(1,$dato['parametro']);
			$sql->bindParam(2,$dato['valor']);	
			$sql->bindParam(3,$dato['modif_por']);			
			$sql->bindParam(4,$dato['fecha_modif']);			
			$sql->bindParam(5,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminar_parametro_modelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM parametros where id_parametro=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

		
		
	}