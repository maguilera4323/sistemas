<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosMovimientos extends ConexionBD{

    public function datosMovimientos(){
        $this->getConexion();
        $sql="SELECT i.nom_insumo, m.cant_movimiento, m.tipo_movimiento, m.fecha_movimiento,
        u.usuario, m.comentario FROM movi_inventario m
        inner join insumos i on i.id_insumo=m.id_insumo
        inner join usuarios u on u.id_usuario=m.id_usuario";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}