<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosPerfil extends ConexionBD{

    public function datosPerfil($id){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.usuario, u.nombre_usuario, u.estado_usuario, r.rol, u.fecha_ultima_conexion,
        u.correo_electronico, u.id_rol FROM usuarios u
        inner join roles r on r.id_rol=u.id_rol
        where u.id_usuario='$id'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}