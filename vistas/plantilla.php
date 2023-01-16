<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY; ?></title>
	<?php include "./vistas/inc/archivos_css.php"; ?>
</head>
<body>
	<?php
		$peticionAjax=false;
		require_once "./controladores/vistasControlador.php";
		$IV = new vistasControlador();

		$vistas=$IV->obtener_vistas_controlador();

		if($vistas=="login" || $vistas=="404" || $vistas=="olvido-contrasena" || $vistas=="rec-correo" || $vistas=="rec-preguntas" || $vistas=="cambiocontrasena"
		 || $vistas=="primer-ingreso" || $vistas=="verifica-codigo" || $vistas=="autoregistro" || $vistas=="preguntasusuario" || $vistas=="rsp" ){
			require_once "./vistas/contenidos/".$vistas."-view.php";

		}else{
			session_start();
			$pagina=explode("/", $_GET['views']);//LA VARIABLE PAGINA YA TIENEN TODOS LOS PARAMETROS DE LA URL MAS LA PLECA /
			require_once './controladores/loginControlador.php';
			$lc= new loginUsuarios();
			
			if(!isset($_SESSION['usuario_login']) || !isset($_SESSION['token_login'])){
				echo $lc->forzarCierreSesionControlador();
				exit;
			}
	?>
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<?php include "./vistas/inc/NavLateral.php"; ?>

		<!-- Page content -->
		<section class="full-box page-content">
			<?php 
				include "./vistas/inc/Navbar.php"; 
				include  $vistas;
			?>
		</section>
	</main>
	<?php
		/* include "./vistas/inc/LogOut.php";  */
		}
		include "./vistas/inc/Script.php";
	?>
</body>
</html>