<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosParametros extends ConexionBD{

    public function datosParametros(){
        $this->getConexion();
        $sql="SELECT id_parametro, parametro, valor FROM parametros";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}