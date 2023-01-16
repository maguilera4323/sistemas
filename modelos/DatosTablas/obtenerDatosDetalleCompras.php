<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosDetalle extends ConexionBD{

    public function datosDetalleCompras($id){
        $this->getConexion();
        $sql="SELECT i.nom_insumo, dc.cantidad_comprada, dc.precio_costo,dc.estado_compra
        FROM detalle_compra dc
        inner join insumos i on i.id_insumo=dc.id_insumo
        where dc.id_compra='$id'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}