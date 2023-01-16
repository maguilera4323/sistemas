<?php
require_once("./config/conexion.php");

class Usuario extends ConexionBD{

    public function obtenerContrasenaHash($user) {
		$this->getConexion();
        $sql="SELECT contrasena FROM usuarios WHERE usuario = '".$user. "' LIMIT 1";
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}

    public function accesoUsuario($user,$password){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.nombre_usuario, u.usuario, u.estado_usuario, u.id_rol, r.rol,u.foto_usuario FROM usuarios u 
        INNER JOIN roles r on r.id_rol=u.id_rol
        WHERE u.usuario='$user' AND u.contrasena='$password'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function verificarEstado($user) {
		$this->getConexion();
		$sql = "SELECT usuario, estado_usuario FROM usuarios WHERE usuario = '".$user. "' LIMIT 1";
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}

    public function intentosValidos() {
		$this->getConexion();
		$sql = "SELECT valor FROM parametros WHERE parametro = 'ADMIN_INTENTOS_INVALIDOS' LIMIT 1";
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}

    public function bloquearUsuario($user) {
		$this->getConexion();
		$sql= ("UPDATE usuarios SET estado_usuario=3 WHERE usuario = '$user'");
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}
}