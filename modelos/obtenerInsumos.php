<?php
    $peticion=true;
	include("./DatosTablas/obtenerDatos.php");
	
	//este archivo se encarga de extraer los datos de la tabla insumos para usarlos en la tabla de Nueva Compra
	//en el apartado donde se agregan los productos
	//los datos obtenidos son enviados a la vista por medio del archivo invoiceFacturacion.js

	$datos=new obtenerDatosTablas();
    $resultado=$datos->datosTablas('insumos');
    $json=array();
    foreach ($resultado as $fila){
		$json[]=array(
			'idInsumo'=>$fila['id_insumo'],
			'nomInsumo'=>$fila['nom_insumo']
		);
	}

	$enviarDatos= json_encode($json);
    echo $enviarDatos;