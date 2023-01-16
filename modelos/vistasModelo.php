<?php
	
	class vistasModelo{

		/*--------- Modelo obtener vistas ---------*/
		protected static function obtener_vistas_modelo($vistas){

			$listaBlanca=["home","proveedores","insumos","compras","nuevacompra","detallecompras","inventario","moviinventario",
			"config","usuarios","parametros","roles","perfil","salir"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vistas=="login" || $vistas=="index" || $vistas=="olvido-contrasena" || $vistas=="rec-correo" || $vistas=="rec-preguntas" || $vistas=="cambiocontrasena"
			 || $vistas=="primer-ingreso" || $vistas=="verifica-codigo" || $vistas=="autoregistro" || $vistas=="preguntasusuario" || $vistas=="rsp"){
				switch($vistas){
					case 'login':
						$contenido="login";
					break;
					case 'index':
						$contenido="login";
					break;
					case 'olvido-contrasena':
						$contenido="olvido-contrasena";
					break;
					case 'rec-correo':
						$contenido="rec-correo";
					break;
					case 'rec-preguntas':
						$contenido="rec-preguntas";
					break;
					case 'cambiocontrasena':
						$contenido="cambiocontrasena";
					break;
					case 'primer-ingreso':
						$contenido="primer-ingreso";
					break;
					case 'verifica-codigo':
						$contenido="verifica-codigo";
					break;
					case 'autoregistro':
						$contenido="autoregistro";
					break;
					case 'preguntasusuario':
						$contenido="preguntasusuario";
					break;
					case 'rsp':
						$contenido="rsp";
					break;
					case 'restaurar':
						$contenido="restaurar";
					break;
					
					
				}

			}elseif($vistas=="login" || $vistas=="index" || $vistas=="prueba" || $vistas=="rec-correo" || $vistas=="rec-preguntas" || $vistas=="cambiocontrasena" 
			|| $vistas=="primer-ingreso" || $vistas=="verifica-codigo" || $vistas=="autoregistro" || $vistas=="preguntasusuario" || $vistas=="rsp"|| $vistas=="restaurar"){
				$contenido="login";

			}else{
				$contenido="404";				
			}
			return $contenido;
		}
	}