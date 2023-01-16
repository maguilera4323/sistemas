<?php
if(isset($peticion)){
    require_once("../config/conexion.php");
}else{
    require_once("./config/conexion.php");
}


class obtenerDatosCompras extends ConexionBD{

    public function datosCompras(){
        $this->getConexion();
        $sql="SELECT c.id_compra, p.nom_proveedor, u.usuario,c.estado_compra, c.fech_compra, c.total_compra 
        FROM compras c
        inner join proveedores p on p.id_proveedor=c.id_proveedor
        inner join usuarios u on u.id_usuario=c.id_usuario
        order by c.id_compra desc";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}