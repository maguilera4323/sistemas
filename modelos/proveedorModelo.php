<?php
	
	require_once "../config/conexion.php";

	class proveedorModelo extends ConexionBD{

		protected function agregar_proveedor_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO proveedores(nom_proveedor,rtn_proveedor,
			tel_proveedor,correo_proveedor,dir_proveedor)
			VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['nombre']);
			$sql->bindParam(2,$datos['rtn']);
			$sql->bindParam(3,$datos['telefono']);
			$sql->bindParam(4,$datos['correo']);
			$sql->bindParam(5,$datos['direccion']);
			$sql->execute();
			return $sql;								
		}



		protected function actualizar_proveedor_modelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE proveedores SET nom_proveedor=?,rtn_proveedor=?,tel_proveedor=?,
			correo_proveedor=?, dir_proveedor=? WHERE id_proveedor=?");

			$sql->bindParam(1,$dato['nombre']);
			$sql->bindParam(2,$dato['rtn']);	
			$sql->bindParam(3,$dato['telefono']);			
			$sql->bindParam(4,$dato['correo']);			
			$sql->bindParam(5,$dato['direccion']);
			$sql->bindParam(6,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminar_proveedor_modelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM proveedores where id_proveedor=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

		
		
	}