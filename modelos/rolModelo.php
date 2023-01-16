<?php
	
	require_once "../config/conexion.php";

	class rolModelo extends ConexionBD{

		protected function agregar_rol_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO roles(rol,descripcion,creado_por,fecha_creacion)
			VALUES(?,?,?,?)");

			$sql->bindParam(1,$datos['rol']);
			$sql->bindParam(2,$datos['desc']);
			$sql->bindParam(3,$datos['creado_por']);
			$sql->bindParam(4,$datos['creacion']);
			$sql->execute();
			return $sql;								
		}



		protected function actualizar_rol_modelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE roles SET rol=?,descripcion=?,modificado_por=?,
			fecha_modificacion=?  WHERE id_rol=?");

			$sql->bindParam(1,$dato['rol']);
			$sql->bindParam(2,$dato['desc']);	
			$sql->bindParam(3,$dato['modif_por']);			
			$sql->bindParam(4,$dato['fecha_modif']);			
			$sql->bindParam(5,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminar_rol_modelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM roles where id_rol=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

		
		
	}