<?php
	
	require_once "../config/conexion.php";

	class compraModelo extends ConexionBD{

		protected function agregar_compra_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO compras(id_proveedor,id_usuario,
			estado_compra,fech_compra,total_compra)
			VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['prov']);
			$sql->bindParam(2,$datos['usuario']);
			$sql->bindParam(3,$datos['estado']);
			$sql->bindParam(4,$datos['fech_ent']);
			$sql->bindParam(5,$datos['total']);
			$sql->execute();
			return $sql;								
		}

		protected function agregar_detallecompra_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO detalle_compra(id_compra,id_insumo,cantidad_comprada,
			precio_costo,estado_compra) VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['id_compra']);
			$sql->bindParam(2,$datos['ins']);
			$sql->bindParam(3,$datos['cant']);
			$sql->bindParam(4,$datos['prec']);
			$sql->bindParam(5,$datos['estado']);
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