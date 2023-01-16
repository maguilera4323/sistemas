<?php
include_once '../config/conexion.php';
    $conexion = new PDO("mysql:host=localhost;dbname=sistema_inventario", "root", "");

        $consulta = "SELECT * FROM proveedores";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

       print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $conexion=null; 
    
?>