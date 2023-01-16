<?php
	
	require_once "../config/conexion.php";

	class insumoModelo extends ConexionBD{

		protected function agregar_insumo_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO insumos(nom_insumo,categoria,
			cant_max,cant_min,unidad_medida)
			VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['nombre']);
			$sql->bindParam(2,$datos['cat']);
			$sql->bindParam(3,$datos['cant_max']);
			$sql->bindParam(4,$datos['cant_min']);
			$sql->bindParam(5,$datos['unid']);
			$sql->execute();
			return $sql;								
		}

		protected function agregar_inv_insumo_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO inventario(cant_existencia)
			VALUES(?)");
			$sql->bindParam(1,$datos['cant']);
			$sql->execute();
			return $sql;						
		}




		protected function actualizar_insumo_modelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE insumos SET nom_insumo=?,categoria=?,cant_max=?,
			cant_min=?, unidad_medida=? WHERE id_insumo=?");

			$sql->bindParam(1,$dato['nombre']);
			$sql->bindParam(2,$dato['cat']);	
			$sql->bindParam(3,$dato['cant_max']);			
			$sql->bindParam(4,$dato['cant_min']);			
			$sql->bindParam(5,$dato['unid']);
			$sql->bindParam(6,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminar_insumo_modelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM insumos where id_insumo=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

		
		
	}