<?php
	
	require_once "../config/conexion.php";

	class usuarioModelo extends ConexionBD{

		protected function agregar_usuario_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO usuarios(usuario,nombre_usuario,estado_usuario,
			contrasena,id_rol,correo_electronico,foto_usuario,creado_por,fecha_creacion)
			VALUES(?,?,?,?,?,?,?,?,?)");

			$sql->bindParam(1,$datos['usuario']);
			$sql->bindParam(2,$datos['nom']);
			$sql->bindParam(3,$datos['est']);
			$sql->bindParam(4,$datos['cont']);
			$sql->bindParam(5,$datos['rol']);
			$sql->bindParam(6,$datos['correo']);
			$sql->bindParam(7,$datos['imagen']);
			$sql->bindParam(8,$datos['creado_por']);
			$sql->bindParam(9,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizar_usuario_modelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET usuario=?,nombre_usuario=?,estado_usuario=?,
			id_rol=?, correo_electronico=?, foto_usuario=? ,modificado_por=? ,fecha_modificacion=? WHERE id_usuario=?");

			$sql->bindParam(1,$dato['usuario']);
			$sql->bindParam(2,$dato['nom']);	
			$sql->bindParam(3,$dato['est']);			
			$sql->bindParam(4,$dato['rol']);			
			$sql->bindParam(5,$dato['correo']);
			$sql->bindParam(6,$dato['imagen']);
			$sql->bindParam(7,$dato['modif_por']);
			$sql->bindParam(8,$dato['fecha_modif']);
			$sql->bindParam(9,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminar_usuario_modelo($id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET estado_usuario=2 where id_usuario=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}


		protected function actualizar_perfil_modelo($dato,$id){
			if ($dato['imagen']!=''){
				$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET usuario=?,nombre_usuario=?,contrasena=?,
				correo_electronico=?, foto_usuario=? ,modificado_por=? ,fecha_modificacion=? WHERE id_usuario=?");

				$sql->bindParam(1,$dato['usuario']);
				$sql->bindParam(2,$dato['nom']);	
				$sql->bindParam(3,$dato['clave']);			
				$sql->bindParam(4,$dato['correo']);			
				$sql->bindParam(5,$dato['imagen']);
				$sql->bindParam(6,$dato['modif_por']);
				$sql->bindParam(7,$dato['fecha_modif']);
				$sql->bindParam(8,$id);
				$sql->execute();
			}else{
				$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET usuario=?,nombre_usuario=?,contrasena=?,
				correo_electronico=? ,modificado_por=? ,fecha_modificacion=? WHERE id_usuario=?");

				$sql->bindParam(1,$dato['usuario']);
				$sql->bindParam(2,$dato['nom']);	
				$sql->bindParam(3,$dato['clave']);			
				$sql->bindParam(4,$dato['correo']);			
				$sql->bindParam(5,$dato['modif_por']);
				$sql->bindParam(6,$dato['fecha_modif']);
				$sql->bindParam(7,$id);
				$sql->execute();
			}
			
			return $sql;
		}

		
		
	}