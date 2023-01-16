<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosTablas extends ConexionBD{

    public function datosTablas($tabla){
        $this->getConexion();
        $sql="SELECT * FROM $tabla";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}