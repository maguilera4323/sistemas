<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosCondicionados extends ConexionBD{

    public function datosTablasCondicionados($tabla,$campo,$dato){
        $this->getConexion();
        $sql="SELECT * FROM $tabla where $campo='$dato'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        
        return $resultado;
    }
    
}