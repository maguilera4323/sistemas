<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosInventario extends ConexionBD{

    public function datosInventario(){
        $this->getConexion();
        $sql="SELECT iv.id_insumo, i.nom_insumo, iv.cant_existencia FROM inventario iv
        inner join insumos i on i.id_insumo=iv.id_insumo";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}